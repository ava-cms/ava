<?php
// Benchmark: Weighted search vs simple filtering
require __DIR__ . '/bootstrap.php';

$query = new Ava\Content\Query($app);
$repo = $app->repository();

// Get all posts raw
$allPosts = $repo->allRaw('post');
$searchTerm = 'lorem';

echo "Testing with " . count($allPosts) . " posts\n";
echo "Search term: \"$searchTerm\"\n\n";

// Test 1: Weighted search (current implementation)
$iterations = 10;
$weightedTimes = [];
for ($i = 0; $i < $iterations; $i++) {
    $repo->clearCache();
    $start = hrtime(true);
    $results = $query->type('post')->search($searchTerm)->perPage(10)->get();
    $end = hrtime(true);
    $weightedTimes[] = ($end - $start) / 1_000_000;
}
$weightedAvg = array_sum($weightedTimes) / count($weightedTimes);

// Test 2: Simple text filtering (no scoring)
$simpleTimes = [];
for ($i = 0; $i < $iterations; $i++) {
    $start = hrtime(true);
    $filtered = array_filter($allPosts, function($item) use ($searchTerm) {
        $haystack = strtolower(
            ($item['title'] ?? '') . ' ' . 
            ($item['excerpt'] ?? '') . ' ' . 
            ($item['body'] ?? '')
        );
        return str_contains($haystack, strtolower($searchTerm));
    });
    $limited = array_slice($filtered, 0, 10);
    $end = hrtime(true);
    $simpleTimes[] = ($end - $start) / 1_000_000;
}
$simpleAvg = array_sum($simpleTimes) / count($simpleTimes);

// Display results
echo "Weighted search (with scoring): " . round($weightedAvg, 2) . " ms\n";
echo "Simple filter (no scoring):     " . round($simpleAvg, 2) . " ms\n";

$diff = $weightedAvg - $simpleAvg;
$overhead = ($diff / $simpleAvg) * 100;

echo "\nOverhead from scoring: " . round($diff, 2) . " ms (" . round($overhead, 1) . "%)\n";

// Cleanup
unlink(__FILE__);
