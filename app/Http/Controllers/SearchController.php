<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

class SearchController extends Controller
{
    public function index(Request $request)
    {
        $q = trim((string) $request->query('q', ''));
        $sections = [];
        $total = 0;

        if ($q !== '') {
            $like = '%'.$q.'%';

            // Add/adjust your real tables+columns here:
            $tables = [
                'destinations' => ['title','name','summary','description'],
                'offers'       => ['title','name','description','details'],
                'posts'        => ['title','excerpt','body','content'],
                'pages'        => ['title','body','content'],
                'info'         => ['title','body','content'],
            ];

            foreach ($tables as $table => $cols) {
                if (!Schema::hasTable($table)) continue;

                $rows = DB::table($table)
                    ->where(function ($w) use ($cols, $like) {
                        foreach ($cols as $c) $w->orWhere($c, 'like', $like);
                    })
                    ->limit(20)
                    ->get();

                if ($rows->count()) {
                    $sections[] = [
                        'section' => Str::headline($table),
                        'items'   => $rows->map(function ($r) {
                            $title = $r->title ?? $r->name ?? 'Untitled';
                            $desc  = $r->summary ?? $r->description ?? $r->excerpt ?? $r->body ?? $r->content ?? null;
                            return [
                                'title'       => $title,
                                'description' => $desc ? Str::limit(strip_tags((string) $desc), 140) : null,
                                'url'         => '#', // replace with your show route if you have one
                            ];
                        })->toArray(),
                    ];
                    $total += $rows->count();
                }
            }

            // Static pages quick matches
            $static = collect([
                ['title' => 'About',        'url' => url('about')],
                ['title' => 'Destinations', 'url' => url('destinations')],
                ['title' => 'Offers',       'url' => url('offers')],
                ['title' => 'Travel Info',  'url' => url('info')],
                ['title' => 'Contact',      'url' => url('contact')],
            ])->filter(fn ($it) => stripos($it['title'], $q) !== false);

            if ($static->count()) {
                $sections[] = [
                    'section' => 'Pages',
                    'items'   => $static->map(fn ($it) => [
                        'title'       => $it['title'],
                        'description' => null,
                        'url'         => $it['url'],
                    ])->values()->all(),
                ];
                $total += $static->count();
            }
        }

        return view('search', [
            'q'        => $q,
            'sections' => $sections,
            'total'    => $total,
            'message'  => $q === '' ? 'Type something to search.' : ($total === 0 ? 'No results found.' : null),
        ]);
    }
}
