
<li class="{{ Request::is('users*') ? 'active' : '' }}">
    <a href="{!! route('users.index') !!}"><i class="fa fa-user"></i><span>Users</span></a>
</li><li class="{{ Request::is('clients*') ? 'active' : '' }}">
    <a href="{{ route('clients.index') }}"><i class="fa fa-edit"></i><span>Clients</span></a>
</li>

<li class="{{ Request::is('deals*') ? 'active' : '' }}">
    <a href="{{ route('deals.index') }}"><i class="fa fa-edit"></i><span>Deals</span></a>
</li>

<li class="{{ Request::is('transactions*') ? 'active' : '' }}">
    <a href="{{ route('transactions.index') }}"><i class="fa fa-edit"></i><span>Transactions</span></a>
</li>

