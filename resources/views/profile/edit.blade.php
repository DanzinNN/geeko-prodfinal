<x-client.client-layout>
    {{-- container pai --}}
    <div class="mx-auto w-[90%] max-w-[1700px]">
        <div class="py-12">
            <div class="max-w-7xl mx-auto space-y-6">
                <div class="p-4 sm:p-8 bg-slate700 shadow sm:rounded-lg border border-slate800">
                    <div class="max-w-xl">
                        @include('profile.partials.update-profile-information-form')
                    </div>
                </div>

                <div class="p-4 sm:p-8 bg-slate700 shadow sm:rounded-lg border border-slate800">
                    <div class="max-w-xl">
                        @include('profile.partials.update-password-form')
                    </div>
                </div>

                <div class="p-4 sm:p-8 bg-slate700 shadow sm:rounded-lg border border-slate800">
                    <div class="max-w-xl">
                        @include('profile.partials.delete-user-form')
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-client.client-layout>
