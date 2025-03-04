<span @class([
    'stock',
    'stock-success' => $value > 10,
    'stock-warning' => $value >= 1 && $value <= 10,
    'stock-danger' => $value <= 0,
])>{{ $value }} unités
</span>
