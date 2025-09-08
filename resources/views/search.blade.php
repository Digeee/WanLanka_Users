@extends('layouts.app')

@section('content')
@php
  // Make the view tolerant: if $sections isn't provided but $results is,
  // convert it into a single "Results" section.
  $sections = $sections ?? (isset($results) ? [[
      'section' => 'Results',
      'items'   => collect($results)->map(function ($r) {
          if (is_array($r)) {
              return [
                  'title'       => $r['title'] ?? ($r['name'] ?? 'Untitled'),
                  'description' => $r['description'] ?? ($r['summary'] ?? null),
                  'url'         => $r['url'] ?? '#',
              ];
          } elseif (is_object($r)) {
              return [
                  'title'       => $r->title ?? ($r->name ?? 'Untitled'),
                  'description' => $r->description ?? ($r->summary ?? null),
                  'url'         => $r->url ?? '#',
              ];
          }
          return ['title' => (string) $r, 'description' => null, 'url' => '#'];
      })->all(),
  ]] : []);

  $q = (string) ($q ?? '');
  $total = $total ?? collect($sections)->sum(fn ($s) => count($s['items'] ?? []));
  $message = $message ?? (trim($q) === '' ? 'Type something to search.' : ($total === 0 ? 'No results found.' : null));
@endphp
