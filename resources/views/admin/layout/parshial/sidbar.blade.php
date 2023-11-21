<section class="sidebar">
    <section class="sidebar-link">
        <a href="{{ route('admin.') }}">panel</a>
    </section>
    <section class="sidebar-link">
        <a href="{{ route('admin.product-category.index') }}">category</a>
    </section>
    @role('admin_tickets')
        <section class="sidebar-link">
            <a href="{{ route('admin.product.index') }}">product</a>
        </section>
    @endrole
    <section class="sidebar-link">
        <a href="{{ route('admin.discount-code.index') }}">Discount Code</a>
    </section>
    <section class="sidebar-link">
        <a href="{{ route('admin.order.index') }}">order</a>
    </section>
    <section class="sidebar-link">
        <a href="{{ route('admin.comment.index') }}">Comment</a>
    </section>
    <section class="sidebar-link">
        <a href="{{ route('admin.banners.index') }}">Banners</a>
    </section>
    <section class="sidebar-link">
        <a href="{{ route('admin.users.index') }}">Users</a>
    </section>
    <section class="sidebar-link">
        <a href="{{ route('admin.users.admins') }}">Admins</a>
    </section>
    <section class="sidebar-link">
        <a href="{{ route('admin.notifacations.index') }}">notifications</a>
    </section>
    <section class="sidebar-link">
        <a href="{{ route('admin.sms.index') }}">SMS Notifications</a>
    </section>
    <section class="sidebar-link">
        <a href="{{ route('admin.email.index') }}">Email Notifications</a>
    </section>
    <section class="sidebar-link">
        <a href="{{ route('admin.tickets-admins.index') }}">Ticket Admins</a>
    </section>
    <section class="sidebar-link">
        <a href="{{ route('admin.tickets-priorities.index') }}">Ticket Priorities</a>
    </section>
    <section class="sidebar-link">
        <a href="{{ route('admin.tickets-category.index') }}">Ticket Categories</a>
    </section>
    @role('admin_tickets')
    <section class="sidebar-link">
        <a href="{{ route('admin.tickets.index') }}">Tickets</a>
    </section>
    @endrole
    <section class="sidebar-link">
        <a href="{{ route('admin.role.index') }}">Role</a>
    </section>
    <section class="sidebar-link">
        <a href="{{ route('admin.permission.index') }}">Permission</a>
    </section>
</section>
