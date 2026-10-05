{{-- Drapeau en SVG (les émojis drapeaux ne s'affichent pas sous Windows). Paramètre : $code (fr|en). --}}
@if ($code === 'fr')
    <svg class="flag" viewBox="0 0 3 2" width="21" height="14" aria-hidden="true" focusable="false">
        <rect width="1" height="2" x="0" fill="#002654"/>
        <rect width="1" height="2" x="1" fill="#fff"/>
        <rect width="1" height="2" x="2" fill="#ce1126"/>
    </svg>
@else
    @php($fid = 'uk'.\Illuminate\Support\Str::random(6))
    <svg class="flag" viewBox="0 0 60 30" width="21" height="14" aria-hidden="true" focusable="false">
        <clipPath id="{{ $fid }}-a"><path d="M0,0 v30 h60 v-30 z"/></clipPath>
        <clipPath id="{{ $fid }}-b"><path d="M30,15 h30 v15 z v15 h-30 z h-30 v-15 z v-15 h30 z"/></clipPath>
        <g clip-path="url(#{{ $fid }}-a)">
            <path d="M0,0 v30 h60 v-30 z" fill="#012169"/>
            <path d="M0,0 L60,30 M60,0 L0,30" stroke="#fff" stroke-width="6"/>
            <path d="M0,0 L60,30 M60,0 L0,30" clip-path="url(#{{ $fid }}-b)" stroke="#C8102E" stroke-width="4"/>
            <path d="M30,0 v30 M0,15 h60" stroke="#fff" stroke-width="10"/>
            <path d="M30,0 v30 M0,15 h60" stroke="#C8102E" stroke-width="6"/>
        </g>
    </svg>
@endif
