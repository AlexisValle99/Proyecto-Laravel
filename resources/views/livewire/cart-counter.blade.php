<div>
    <div class="header__cart">
        <ul>
            <!-- <li><a href="#"><i class="fa fa-heart"></i> <span>1</span></a></li> -->
            <li><a href="{{ route('my.cart') }}"><i class="fa fa-shopping-bag"></i>
                 @if(Cart::count() > 0)
                    <span>{{ Cart::count() }}</span>
                @endif
            </a></li>
        </ul>
        <div class="header__cart__price"><span>${{ Cart::subtotal() }}</span></div>
    </div>
</div>
