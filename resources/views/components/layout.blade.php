<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>home</title>
    <link rel="stylesheet" href="/css/test.css"
</head>
<body>
    <nav>
        <!-- <a href="/">home</a> -->
         <x-nav-link href="/">home</x-nav-link>
        <x-nav-link href="/products">show products</x-nav-link>
        <x-nav-link href="/products/create">Add products</x-nav-link>
    </nav>
    <!-- use the slot aailable variable to insert the default slot (main section) -->
    <!-- <?php //echo $slot; ?>  this is equal to the line below because it's blade-->
     <h1>{{$title}}</h1>
    <main>
        {{$slot}}
    </main>

</body>
</html>