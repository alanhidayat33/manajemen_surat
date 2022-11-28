<div class="bg-primary bg-primary shadow p-2 justify-content-center" style="border-radius:15px; height:560px">
    <div class="brand hstack my-5 justify-content-center">
        <img src="{{ URL::to('/assets/img/5540782.png') }}" alt="user" width="50px">
        <h2 class="ms-2 text-white my-auto fw-bold" style="letter-spacing:2px">Surat.in</h2>
    </div>
    <div class="account row">
        <div class="col-3 ps-4">
            <img src="{{ URL::to('/assets/img/user.png') }}" alt="user" width="40px">
        </div>
        <div class="rincian align-items-center col-7">
            <p class="text-white mb-0 lh-0 fw-bold" style="font-size:15px">{{ Auth::user()->name }}</p>
            <p class="mb-0 lh-0" style="font-size:11px; color:yellow">As {{auth::user()->type }}</p>
        </div>
        <div class="col-2 pe-4">
            <a href="#" class="ls-0 text-end mt-1 text-white nav-link text-decoration-none"
                style="font-size:22px;">></a>
        </div>
    </div>
    <div class="menu justify-content-center ms-5 mt-5">
        <div class="my-3">
            <a href="/home" class="nav-link text-decoration-none text-white fs-6">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-house-fill" viewBox="1 2 16 16">
                    <path fill-rule="evenodd"
                        d="m8 3.293 6 6V13.5a1.5 1.5 0 0 1-1.5 1.5h-9A1.5 1.5 0 0 1 2 13.5V9.293l6-6zm5-.793V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
                    <path fill-rule="evenodd"
                        d="M7.293 1.5a1 1 0 0 1 1.414 0l6.647 6.646a.5.5 0 0 1-.708.708L8 2.207 1.354 8.854a.5.5 0 1 1-.708-.708L7.293 1.5z" />
                </svg> <span class="ms-3">Home</span>
            </a>
        </div>
        @if(auth()->user()->type != 'Maha')
        <div class="my-3">
            <a href="/view-sm" class="nav-link text-decoration-none text-white fs-6">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="20" fill="currentColor"
                    class="bi bi-person-circle" viewBox="0 2 16 16">
                    <path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
                    <path
                        d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555ZM0 4.697v7.104l5.803-3.558L0 4.697ZM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757Zm3.436-.586L16 11.801V4.697l-5.803 3.546Z" />
                </svg></svg> <span class="ms-3">Surat Masuk</span>
            </a>
        </div>
        @endif
        @if(auth()->user()->type != 'Direktur' && auth()->user()->type != 'Wadir')
        <div class="my-3">
            <a href="/view-sk" class="nav-link text-decoration-none text-white fs-6">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="18" fill="currentColor"
                    class="bi bi-file-earmark-check-fill" viewBox="1 2 16 16">
                    <path
                        d="M15.964.686a.5.5 0 0 0-.65-.65L.767 5.855H.766l-.452.18a.5.5 0 0 0-.082.887l.41.26.001.002 4.995 3.178 3.178 4.995.002.002.26.41a.5.5 0 0 0 .886-.083l6-15Zm-1.833 1.89L6.637 10.07l-.215-.338a.5.5 0 0 0-.154-.154l-.338-.215 7.494-7.494 1.178-.471-.47 1.178Z" />
                </svg></svg> <span class="ms-3">Surat Keluar</span>
            </a>
        </div>
        @endif
        @if(auth()->user()->type == 'Admin')
        <div class="my-3">
            <a href="/view-jenis" class="nav-link text-decoration-none text-white fs-6">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-people-fill" viewBox="0 2 16 16">
                    <path fill-rule="evenodd" d="M6.5 9.5 3 7.5v-6A1.5 1.5 0 0 1 4.5 0h7A1.5 1.5 0 0 1 13 1.5v6l-3.5 2L8 8.75l-1.5.75ZM1.059 3.635 2 3.133v3.753L0 5.713V5.4a2 2 0 0 1 1.059-1.765ZM16 5.713l-2 1.173V3.133l.941.502A2 2 0 0 1 16 5.4v.313Zm0 1.16-5.693 3.337L16 13.372v-6.5Zm-8 3.199 7.941 4.412A2 2 0 0 1 14 16H2a2 2 0 0 1-1.941-1.516L8 10.072Zm-8 3.3 5.693-3.162L0 6.873v6.5Z"/>
                </svg> <span class="ms-3">Jenis Surat</span>
            </a>
        </div>
        <div class="my-3">
            <a href="/view-user" class="nav-link text-decoration-none text-white fs-6">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-people-fill" viewBox="0 2 16 16">
                    <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z" />
                    <path fill-rule="evenodd"
                        d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z" />
                    <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z" />
                </svg> <span class="ms-3">Data User</span>
            </a>
        </div>
        @endif
        <div class="my-3">
            <a href="/logout" class="nav-link text-decoration-none text-white fs-6">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor"
                    class="bi bi-door-open-fill" viewBox="0 0 16 16">
                    <path
                        d="M1.5 15a.5.5 0 0 0 0 1h13a.5.5 0 0 0 0-1H13V2.5A1.5 1.5 0 0 0 11.5 1H11V.5a.5.5 0 0 0-.57-.495l-7 1A.5.5 0 0 0 3 1.5V15H1.5zM11 2h.5a.5.5 0 0 1 .5.5V15h-1V2zm-2.5 8c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1z" />
                </svg> <span class="ms-3">Logout</span>
            </a>
        </div>
    </div>
</div>
