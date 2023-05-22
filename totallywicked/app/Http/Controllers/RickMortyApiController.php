<?php

namespace App\Http\Controllers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Http\Request;


class RickMortyApiController extends Controller
{
    public function getIndex()
    {
        $cacheKey = 'rickmorty.characters';
        $characters = Cache::remember($cacheKey, 60 * 60, function () {
            $response = Http::get('https://rickandmortyapi.com/api/character');

            if ($response->failed()) {
                abort(404, 'Error fetching data from the API.');
            }

            return collect($response->json()['results']);
        });
        $characters = $characters->map(function ($character) {
            $episodes = $this->getCharacterEpisodes($character['episode']);
            $character['episodes'] = $episodes;
            $character['hasMultipleEpisodes'] = count($episodes) > 1;
            return $character;
        });

        $perPage = 6;

        $paginator = $this->paginate($characters, $perPage);
        $characters = $paginator->appends(request()->except('page'));

        // Check if the requested page has no records
        if ($paginator->isEmpty() && $paginator->currentPage() > 1) {
            return redirect($paginator->url($paginator->lastPage()));
        }

        return view('index', compact('characters'));
    }

    private function paginate($items, $perPage)
    {
        $page = Paginator::resolveCurrentPage('page');
        $results = $items->slice(($page - 1) * $perPage, $perPage);

        return new LengthAwarePaginator(
            $results,
            $items->count(),
            $perPage,
            $page,
            ['path' => Paginator::resolveCurrentPath()]
        );
    }

    public function search(Request $request)
    {
        $validatedData = $request->validate([
            'query' => 'nullable|string',
            'page' => 'nullable|numeric|min:1',
        ]);

        $query = $validatedData['query'] ?? '';
        $page = $validatedData['page'] ?? 1;
        $perPage = empty($query) ? 10 : 3;

        if (empty($query)) {
            $response = Http::get('https://rickandmortyapi.com/api/character', [
                'page' => $page,
            ]);
        } else {
            $response = Http::get('https://rickandmortyapi.com/api/character', [
                'name' => $query,
                'page' => $page,
            ]);
        }

        if ($response->failed()) {
            return redirect()->route('home')->with('error', 'Error fetching data from the API.');
        }

        $characters = collect($response->json()['results']);

        $pagination = $this->paginate($characters, $perPage);

        return view('index')->with('characters', $pagination);
    }

    public function characters()
    {
        $response = Http::get('https://rickandmortyapi.com/api/character');

        if ($response->failed()) {
            abort(500, 'Error fetching data from the API.');
        }

        $characters = collect($response->json()['results']);

        if (!view()->exists('characters')) {
            abort(404);
        }

        return view('characters', compact('characters'));
    }

    private function getCharacterEpisodes($episodeUrls)
    {
        $episodes = [];

        foreach ($episodeUrls as $url) {
            $response = Http::get($url);

            if ($response->failed()) {
                abort(500, 'Error fetching episode data from the API.');
            }

            $episode = $response->json();
            $episodes[] = $episode;
        }

        return $episodes;
    }

}
