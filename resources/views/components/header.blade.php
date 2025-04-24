
<style>
    @media (max-width: 600px) {
        header img{
            width: 100px !important;
        }
    }
</style>
<div class="fixed inset-x-0 top-0 h-[100px] bg-grey-600 z-40 transition-all duration-150 opacity-0 invisible"></div>
<header class="w-full flex items-center h-[100px] top-0 z-50 transition-colors bg-transparent inset-x-0" style="background: transparent; height: 100px;">
    <div class="w-full px-4 lg:px-6 flex items-center justify-between">
        <a aria-label="Century21 Homepage" href="/">
            <img src="{{Url('assets/logo.png')}}" style="width: 250px;"/>             
        </a>
        <nav class="items-center gap-6 flex">
            <a class="button-md font-bold text-black" href="/contact">Comprar</a>
            <a class="button-md font-bold text-black" href="/alquilar">Alquilar</a>
        </nav>
    </div>
</header>