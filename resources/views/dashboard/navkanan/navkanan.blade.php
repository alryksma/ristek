<div class="sidebar border border-right col-md-3 col-lg-2 p-0 bg-body-tertiary">
    <div class="offcanvas-md offcanvas-end bg-body-tertiary" tabindex="-1" id="sidebarMenu"
        aria-labelledby="sidebarMenuLabel">
        <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="sidebarMenuLabel">Company name</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu"
                aria-label="Close"></button>
        </div>
        <div class="offcanvas-body d-md-flex flex-column p-0 pt-lg-3 overflow-y-auto">
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2" href="/tambahbarang">
                        <svg class="bi">
                            <use xlink:href="#file-earmark" />
                        </svg>
                        Tambah Barang
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2" href="/hapusbarang">
                        <svg class="bi">
                            <use xlink:href="#cart" />
                        </svg>
                        Hapus Barang
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link d-flex align-items-center gap-2" href="/editbarang">
                        <svg class="bi">
                            <use xlink:href="#people" />
                        </svg>
                        Edit barang
                    </a>
                </li>
            </ul>


            <hr class="my-3">
            <ul class="nav flex-column mb-auto">
                <ul class="nav flex-column mb-auto">
                    <li class="nav-item">
                        <form action="/logout" method="post">
                            @csrf
                            <button type="submit" class="dropdown-item"> <i
                                    class="nav-link d-flex align-items-center gap-2">
                                    <svg class="bi">
                                        <use xlink:href="#door-closed" />
                                    </svg>
                                    Sign out
                                </i></button>
                        </form>
                    </li>
                </ul>
            </ul>
        </div>
    </div>
</div>
