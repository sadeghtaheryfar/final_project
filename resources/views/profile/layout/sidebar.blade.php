<section class="sidebar-nav">
    <section class="sidebar-nav-item">
        <span class="sidebar-nav-item-title"><a class="p-3" href="{{ route('myOrders', $filter = '1') }}">سفارش های
                من</a></span>
    </section>
    <section class="sidebar-nav-item">
        <span class="sidebar-nav-item-title"><a class="p-3" href="{{ route('adress.index') }}">آدرس های من</a></span>
    </section>
    <section class="sidebar-nav-item">
        <span class="sidebar-nav-item-title"><a class="p-3" href="{{ route('myFavorites') }}">لیست علاقه
                مندی</a></span>
    </section>
    <section class="sidebar-nav-item">
        <span class="sidebar-nav-item-title"><a class="p-3" href="{{ route('myComparisons') }}">لیست
                مقایسه</a></span>
    </section>
    <section class="sidebar-nav-item">
        <span class="sidebar-nav-item-title"><a class="p-3" href="{{ route('myProfile') }}">ویرایش حساب</a></span>
    </section>
    <section class="sidebar-nav-item">
        <span class="sidebar-nav-item-title"><a class="p-3" href="{{ route('myTickets.index') }}">تیکت ها</a></span>
    </section>
    <section class="sidebar-nav-item">
        <form action="{{ route('logout') }}" method="post">
            @csrf
            <button type="submit" class="sidebar-nav-item-title border-0 bg-transparent p-3">خروج از حساب کاربری</button>
        </form>
    </section>

</section>
