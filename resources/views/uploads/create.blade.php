<x-main-layout page-title="Dear Boss, wanna upload the photo or video?"
    page-description="Place to share your fun, exotic and beautiful photo or video.">
    <main>
        <h1 class="sr-only">Upload photo and video here</h1>
        <form class="m-4 mt-20" action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data" x-data="formAction()">
            @csrf
            <div class="sm:col-span-6">
                <label for="cover-photo" class="sr-only">Select Photo or Video file</label>
                <div id="preview"
                    class="mt-1 justify-center rounded-md border-2 border-dashed border-gray-600 px-6 pt-5 pb-6 h-60 bg-no-repeat bg-cover bg-center">
                    <div class="text-center">
                        <div class="text-md text-gray-400">
                            <label for="post-file"
                                class="p-1 cursor-pointer rounded-md bg-red-500 font-medium text-white focus-within:outline-none focus-within:ring-2 focus-within:ring-red-500 focus-within:ring-offset-2 hover:text-white">
                                <span class="p-1">Select a file</span>
                                <input id="post-file" name="postFile" type="file" accept="image/*" @change="showPreview(event)" class="sr-only" required />
                            </label>
                        </div>
                        <p class="text-xs text-gray-400 mt-2">PNG, JPG, MP4, AVI up to 30MB</p>
                    </div>
                </div>

                <div class="mt-8">
                    <label for="about" class="block text-sm font-medium text-gray-500">Description</label>
                    <div class="mt-1">
                        <textarea id="post-text" name="postText" rows="4" class="block w-full rounded-md border-gray-600 shadow-sm dark:bg-gray-700 focus:border-red-500 focus:ring-red-500 sm:text-sm" maxlength="140" required>{{ old('postText') }}</textarea>
                    </div>
                    <p class="mt-2 text-sm text-gray-500">Write a few sentences about photo/video max 140 characters.
                    </p>
                </div>

                <div class="mt-8">
                    <button type="submit"
                        class="w-full inline-flex justify-center rounded-md border border-transparent bg-red-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">Upload</button>
                </div>
            </div>
        </form>

@if ($errors->any())
        <x-alert-error title="Upload Failed" message="{{ $errors->first() }}" button="Try Again" />
@endif
    </main>

    <script type="text/javascript">
        function formAction() {
        return {
            showPreview(event) {
                if (event.target.files.length > 0) {
                    var src = URL.createObjectURL(event.target.files[0]);
                    var preview = document.getElementById("preview");
                    preview.style.backgroundImage = "url('" + src + "')";
                }
            },
        }
    }
    </script>
</x-main-layout>
