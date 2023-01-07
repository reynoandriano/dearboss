<x-main-layout page-title="Dear Boss, wanna upload the photo or video?"
    page-description="Place to share your fun, exotic and beautiful photo or video.">
    <main>
        <h1 class="sr-only">Upload photo and video here</h1>
        <form class="space-y-8 divide-y divide-gray-200 m-4 mt-20">
            <div class="space-y-8 divide-y divide-gray-200">
                <div class="sm:col-span-6">
                    {{-- <label for="cover-photo" class="block text-sm font-medium text-gray-700">Cover photo</label> --}}
                    <div x-data="showImage()" id="preview"
                        class="mt-1 flex justify-center rounded-md border-2 border-dashed border-gray-600 px-6 pt-5 pb-6 h-60 bg-no-repeat bg-cover bg-center">
                        <div class="space-y-1 text-center">
                            {{-- <img id="preview" class="absolute inset-0 w-full h-32"> --}}
                            {{-- <svg class="mx-auto h-12 w-12 text-gray-400" stroke="currentColor" fill="none"
                                viewBox="0 0 48 48" aria-hidden="true">
                                <path
                                    d="M28 8H12a4 4 0 00-4 4v20m32-12v8m0 0v8a4 4 0 01-4 4H12a4 4 0 01-4-4v-4m32-4l-3.172-3.172a4 4 0 00-5.656 0L28 28M8 32l9.172-9.172a4 4 0 015.656 0L28 28m0 0l4 4m4-24h8m-4-4v8m-12 4h.02"
                                    stroke-width="2" stroke-linecap="round" stroke-linejoin="round" />
                            </svg> --}}
                            <div class="flex text-sm text-gray-400">
                                <label for="file-upload"
                                    class="relative cursor-pointer rounded-md bg-red-500 font-medium text-white focus-within:outline-none focus-within:ring-2 focus-within:ring-red-500 focus-within:ring-offset-2 hover:text-white">
                                    <span class="p-1">Select a file</span>
                                    <input id="file-upload" name="file-upload" type="file" accept="image/*" @change="showPreview(event)" class="sr-only">
                                </label>
                                <p class="pl-1">or drag and drop</p>
                            </div>
                            <p class="text-xs text-gray-500">PNG, JPG, MP4, AVI up to 30MB</p>
                        </div>
                    </div>
                    
                    <div class="mt-8">
                        <label for="about" class="block text-sm font-medium text-gray-500">Description</label>
                        <div class="mt-1">
                          <textarea id="about" name="about" rows="4" class="block w-full rounded-md border-gray-600 shadow-sm dark:bg-gray-700 focus:border-red-500 focus:ring-red-500 sm:text-sm" maxlength="140"></textarea>
                        </div>
                        <p class="mt-2 text-sm text-gray-500">Write a few sentences about photo/video max 140 characters.</p>
                    </div>

                    <div class="mt-8">
                        <button type="submit" class="w-full inline-flex justify-center rounded-md border border-transparent bg-red-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-red-700 focus:outline-none focus:ring-2 focus:ring-red-500 focus:ring-offset-2">Upload</button>
                    </div>

                </div>
            </div>
        </form>
    </main>
    <script type="text/javascript">
    function showImage() {
        return {
            showPreview(event) {
                if (event.target.files.length > 0) {
                    var src = URL.createObjectURL(event.target.files[0]);
                    var preview = document.getElementById("preview");
                    preview.style.backgroundImage = "url('" + src + "')";
                }
            }
        }
    }
    </script>
</x-main-layout>
