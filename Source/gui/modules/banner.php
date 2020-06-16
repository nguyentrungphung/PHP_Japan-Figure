<div class="container">
    <img id="img-banner"  src="./img/banner_3.jpg" alt="banner"/>
</div>

<script type="text/javascript">

    var i = 0;
    var img = document.getElementById('img-banner');

    var slideBanner = setInterval(function(){
        if(img == null) clearInterval(slideBanner);

        i++;

        if(i % 4 == 0) img.setAttribute('class', 'slideLeft');
        else if(i % 4 == 1) img.setAttribute('class', 'slideTop');
        else if(i % 4 == 2) img.setAttribute('class', 'slideRight');
        else img.setAttribute('class', 'slideBottom');

        img.setAttribute('src', "./img/banner_" + (i%6 + 1) + ".jpg");
    }, 5000);

</script>
