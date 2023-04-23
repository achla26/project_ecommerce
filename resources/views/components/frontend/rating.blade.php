<div class="ec-pro-rating">
    @for ($i = 1; $i <= 5; $i++)
        <i class="ecicon eci-star {{ ($i <= $rating) ? "fill" :""}} "></i>
    @endfor
</div>