<?php
/**
 * Test file for Tailwind colors
 */
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">
</head>
<body>
    <div class="p-8 space-y-8">
        <!-- Academia -->
        <div class="bg-yellow-200 p-6 rounded-lg">
            <h2 class="text-yellow-950 text-2xl font-bold">Academia</h2>
            <p class="text-yellow-800 mt-2">Subtitle text here</p>
            <div class="bg-yellow-300/30 p-4 mt-4 text-yellow-600">Highlighted content</div>
            <div class="bg-yellow-300 p-4 mt-4">Grid content</div>
            <button class="bg-yellow-500 hover:bg-yellow-600 text-white px-4 py-2 rounded mt-4">Button</button>
        </div>

        <!-- En Linea -->
        <div class="bg-red-200 p-6 rounded-lg">
            <h2 class="text-red-950 text-2xl font-bold text-red-700">En Linea</h2>
            <p class="text-red-800 mt-2">Subtitle text here</p>
            <div class="bg-red-300/30 p-4 mt-4 text-red-600">Highlighted content</div>
            <div class="bg-red-300 p-4 mt-4">Grid content</div>
            <button class="bg-red-500 hover:bg-red-600 text-white px-4 py-2 rounded mt-4">Button</button>
        </div>

        <!-- Colaboratorio -->
        <div class="bg-teal-200 p-6 rounded-lg text-teal-600 text-teal-700">
            <h2 class="text-teal-950 text-2xl font-bold">Colaboratorio</h2>
            <p class="text-teal-800 mt-2">Subtitle text here</p>
            <div class="bg-teal-300/30 p-4 mt-4">Highlighted content</div>
            <div class="bg-teal-300 p-4 mt-4">Grid content</div>
            <button class="bg-teal-500 hover:bg-teal-600 text-white px-4 py-2 rounded mt-4">Button</button>
        </div>

        <!-- Total Transmedia -->
        <div class="bg-blue-300 p-6 rounded-lg">
            <h2 class="text-blue-950 text-2xl font-bold text-blue-700">Total Transmedia</h2>
            <p class="text-blue-800 mt-2">Subtitle text here</p>
            <div class="bg-blue-300/30 p-4 mt-4">Highlighted content</div>
            <div class="bg-blue-300 p-4 mt-4">Grid content</div>
            <button class="bg-blue-500 hover:bg-blue-600 text-white px-4 py-2 rounded mt-4">Button</button>
        </div>

        <!-- Ready -->
        <div class="bg-purple-200 p-6 rounded-lg text-purple-600 text-purple-700">
            <h2 class="text-purple-950 text-2xl font-bold">Ready</h2>
            <p class="text-purple-800 mt-2">Subtitle text here</p>
            <div class="bg-purple-300/30 p-4 mt-4">Highlighted content</div>
            <div class="bg-purple-300 p-4 mt-4">Grid content</div>
            <button class="bg-purple-500 hover:bg-purple-600 text-white px-4 py-2 rounded mt-4">Button</button>
        </div>
    </div>
</body>
</html>
