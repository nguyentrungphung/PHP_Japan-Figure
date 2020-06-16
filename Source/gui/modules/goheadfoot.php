
<div id="go-head-foot">
    <i onclick="goHeader()" class="fa fa-caret-square-up"></i>
    <!-- <i onclick="goFooter()" class="fas fa-chevron-circle-down"></i> -->
    
</div>

<script type="text/javascript">

    function goHeader()
    {
        var pos = window.pageYOffset;
        var scrollToTop = window.setInterval(function() {
            if ( pos > 00 ) window.scrollTo( 0, pos -= 10 );
            else window.clearInterval( scrollToTop );
        }, 2);
    }

    // function goFooter()
    // {
    //     var pos = window.pageYOffset;
    //     var endPos = document.body.scrollHeight;
    //     var scrollToTop = window.setInterval(function() {
    //         if ( pos < endPos ) window.scrollTo( 0, pos += 10 );
    //         else window.clearInterval( scrollToTop );
    //     }, 2);
    // }

</script>