
<li class="{{ Request::is('clients*') ? 'active' : '' }}">
    <a href="{{ route('clients.index') }}"><i class="fa fa-edit"></i><span>Clients</span></a>
</li>

<li class="{{ Request::is('deals*') ? 'active' : '' }}">
    <a href="{{ route('deals.index') }}"><i class="fa fa-edit"></i><span>Deals</span></a>
</li>

<li class="{{ (Request::is('transactions*') OR Request::is('search*')) ? 'active' : '' }}">
    <a href="{{ route('transactions.index') }}"><i class="fa fa-edit"></i><span>Transactions</span></a>
</li>