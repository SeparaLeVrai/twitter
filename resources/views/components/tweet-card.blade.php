<div
    class="group relative h-full bg-white rounded-md shadow-md shadow-slate-700 p-5 w-full hover:shadow-lg hover:scale-105 hover:bg-blue-400 transition">
    <div class="font-bold text-gray-800 group-hover:text-white">
        {{ $tweet->text }}
    </div>
    <div class="justify-self-end absolute bottom-5 left-5 text-blue-400 group-hover:text-white">
        {{ $tweet->user->pseudo }}
    </div>
</div>
