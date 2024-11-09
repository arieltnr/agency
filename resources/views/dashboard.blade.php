<!DOCTYPE html>
<html lang="en">
    
<x-app-layout>
    {{-- <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot> --}}
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>Modern CSS Basics - Instagram Profile Page (Syntax - Class)</title>
    <link rel="stylesheet" href="style.css" />
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>

<body>
    <header>

        <div class="container">

            <div class="profile">

                <div class="profile-image">

                    <img src="https://images.unsplash.com/photo-1513721032312-6a18a42c8763?w=152&h=152&fit=crop&crop=faces" alt="">

                </div>

                <div class="profile-user-settings">

                    <h1 class="profile-user-name"><div>{{ Auth::user()->name }}</div></h1>

                    <button class="btn profile-edit-btn">Edit Profile</button>

                    <button class="btn profile-settings-btn" aria-label="profile settings"><i class="fas fa-cog" aria-hidden="true"></i></button>

                </div>

                <div class="profile-stats">

                    <ul>
                        <li><span class="profile-stat-count">164</span> posts</li>
                        <li><span class="profile-stat-count">188</span> followers</li>
                        <li><span class="profile-stat-count">206</span> following</li>
                    </ul>

                </div>

                <div class="profile-bio">

                    <p><span class="profile-real-name">Jane Doe</span> Lorem ipsum dolor sit, amet consectetur adipisicing elit 📷✈️🏕️</p>

                </div>

            </div>
            <!-- End of profile section -->

        </div>
        <!-- End of container -->

    </header>

    <main>
        <div class="container">
            <ul class="stories">
                <li class="story-item">
                    <div class="image">
                        <img src="https://images.unsplash.com/photo-1513721032312-6a18a42c8763?w=152&h=152&fit=crop&crop=faces" alt="">
                    </div>
                    <div class="title">IDPWD</div>
                </li>
                <li class="story-item">
                    <div class="image">
                        <img src="https://images.unsplash.com/photo-1513721032312-6a18a42c8763?w=152&h=152&fit=crop&crop=faces" alt="">
                    </div>
                    <div class="title">🎈🧪</div>
                </li>
                <li class="story-item">
                    <div class="image">
                        <img src="https://images.unsplash.com/photo-1513721032312-6a18a42c8763?w=152&h=152&fit=crop&crop=faces" alt="">
                    </div>
                    <div class="title">Diwali</div>
                </li>
                <li class="story-item">
                    <div class="image">
                        <img src="https://images.unsplash.com/photo-1513721032312-6a18a42c8763?w=152&h=152&fit=crop&crop=faces" alt="">
                    </div>
                    <div class="title">Masked</div>
                </li>
                <li class="story-item">
                    <div class="image">
                        <img src="https://images.unsplash.com/photo-1513721032312-6a18a42c8763?w=152&h=152&fit=crop&crop=faces" alt="">
                    </div>
                    <div class="title">Dark Universe</div>
                </li>
            </ul>
            <div class="gallery">

                <div onclick="openPopup()" class="gallery-item" tabindex="0">

                    <img src="https://images.unsplash.com/photo-1511765224389-37f0e77cf0eb?w=500&h=500&fit=crop" class="gallery-image" alt="">

                    <div class="gallery-item-info">

                        <ul>
                            <li class="gallery-item-likes"><span class="visually-hidden">Likes:</span><i class='bx bxs-heart'></i> 56</li>
                            <li class="gallery-item-comments"><span class="visually-hidden">Comments:</span><i class='bx bxs-message-rounded-dots' ></i> 2</li>
                        </ul>

                    </div>

                </div>

            </div>
            <div class="relative">
                <!-- Popup Overlay (Fullscreen) -->
                <div id="popup-overlay" class="fixed inset-0 bg-black bg-opacity-80 flex items-center justify-center hidden z-50">
                    <!-- Popup Content -->
                    <button onclick="closePopup()" class="absolute top-7 right-7 text-white text-6xl font-bold hover:text-gray-300">
                        &times;
                    </button>
                    <div class="container relative max-w-full max-h-full">
                        {{-- <div class="flex justify-between"> --}}
                        <div class="grid lg:flex justify-center bg-black opacity-80">
                            <div class="w-full h-auto max-h-screen shadow-lg p-5">
                                <img class="" id="image1" src="https://via.placeholder.com/1200x800" alt="Fullscreen Popup Image">
                            </div>
                            <div class="w-full h-auto max-h-screen shadow-lg p-5">
                                <div class="grid grid-cols-1 grid-rows-3 h-full text-white">
                                    <div class="h-full row-span-3">Descripstion image</div>
                                    <div class="h-full">
                                        <textarea id="about" placeholder="Comment Here..." name="about" rows="3" class="block w-full h-full rounded-md border-0 py-1.5 text-gray-900 shadow-sm ring-1 ring-inset ring-gray-300 placeholder:text-gray-400 focus:ring-2 focus:ring-inset focus:ring-indigo-600 sm:text-sm/6"></textarea>
                                    </div>
                                    <div class="flex justify-end mt-2 h-full w-full">
                                        <button class="bg-white text-black p-2 px-10 rounded-md">Save</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End of gallery -->

            {{-- <div class="loader"></div> --}}

        </div>
        <!-- End of container -->

    </main>
</body>

</html>
<script>
    function openPopup() {
        var image = document.getElementById('image1').src = 'https://images.unsplash.com/photo-1511765224389-37f0e77cf0eb?w=500&h=500&fit=crop';
    document.getElementById("popup-overlay").classList.remove("hidden");
}

function closePopup() {
    document.getElementById("popup-overlay").classList.add("hidden");
}
    /*

Full-page view:

https://codepen.io/GeorgePark/full/VXrwOP/

*/

    // const posts = document.querySelectorAll('.gallery-item');

    // posts.forEach(post => {
    // 	post.addEventListener('click', () => {
    // 		//Get original image URL
    // 		const imgUrl = post.firstElementChild.src.split("?")[0];
    // 		//Open image in new tab
    // 		window.open(imgUrl, '_blank');
    // 	});
    // });
</script>
</x-app-layout>
