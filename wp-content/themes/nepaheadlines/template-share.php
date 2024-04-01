<span class="social-scroll__count" style="display:none;"></span>
	<ul class="share-buttons">
    <li>
        <a class="share-twitter" href="https://twitter.com/intent/tweet?text=<?php echo $title; ?>&amp;url=<?php echo $url; ?>&amp;via=Nepa_Headlines" target="_blank">
            <svg id="twitter" data-name="twitter" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 58.1 47.2">
                <title>twitter</title>
                <path d="M54.86,20.19v1.55c0,15.74-12,33.88-33.88,33.88A33.64,33.64,0,0,1,2.74,50.27a24.55,24.55,0,0,0,2.88.15A23.84,23.84,0,0,0,20.4,45.33,11.93,11.93,0,0,1,9.27,37.07a15,15,0,0,0,2.25.18,12.58,12.58,0,0,0,3.13-.41A11.91,11.91,0,0,1,5.1,25.17V25a12,12,0,0,0,5.38,1.51A11.92,11.92,0,0,1,6.8,10.61,33.84,33.84,0,0,0,31.35,23.06a13.44,13.44,0,0,1-.29-2.73,11.92,11.92,0,0,1,20.61-8.15,23.43,23.43,0,0,0,7.56-2.87A11.87,11.87,0,0,1,54,15.88,23.87,23.87,0,0,0,60.84,14,25.59,25.59,0,0,1,54.86,20.19Z" transform="translate(-2.74 -8.42)"/>
            </svg>
        </a>
    </li>
    <li>
        <a class="share-facebook" href="https://www.facebook.com/sharer/sharer.php?u=<?php echo $url; ?>" target="_blank">
            <svg id="facebook" data-name="facebook" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30.61 59.03">
                <title>facebook</title>
                <path d="M47.2,12.76H41.63c-4.36,0-5.18,2.09-5.18,5.11v6.71h10.4l-1.38,10.5h-9V62H25.59V35.07h-9V24.57h9V16.84c0-9,5.5-13.87,13.52-13.87a69.4,69.4,0,0,1,8.09.43Z" transform="translate(-16.59 -2.97)"/>
            </svg>
        </a>
    </li>
    <li>
        <a class="share-googleplus" href="https://plus.google.com/share?url=<?php echo $url; ?>" target="_blank">
            <svg id="googleplus" data-name="googleplus" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 59.45 37.8">
                <title>googleplus</title>
                <path d="M21.65,53.45a18.9,18.9,0,0,1,0-37.8,18.05,18.05,0,0,1,12.66,5l-5.13,4.93a10.61,10.61,0,0,0-7.53-2.91,11.94,11.94,0,0,0,0,23.88c7.48,0,10.29-5.39,10.73-8.15H21.65V31.9H39.49A16,16,0,0,1,39.8,35C39.8,45.79,32.55,53.45,21.65,53.45Zm40.51-16.2H56.77v5.39H51.35V37.25H46V31.84h5.39V26.45h5.42v5.39H62.2Z" transform="translate(-2.75 -15.65)"/>
            </svg>
        </a>
    </li>
    <li>
        <a class="share-link" id="sharelink" href="https://www.nepaheadlines.com/" target="_blank">
            <svg id="link" data-name="link" xmlns="http://www.w3.org/2000/svg" viewBox="0 -107 512 512"class=""><title>link</title><g><path d="m362.667969 298.667969h-48c-8.832031 0-16-7.167969-16-16s7.167969-16 16-16h48c64.703125 0 117.332031-52.652344 117.332031-117.335938 0-64.679687-52.628906-117.332031-117.332031-117.332031h-48c-8.832031 0-16-7.167969-16-16s7.167969-16 16-16h48c82.34375 0 149.332031 67.007812 149.332031 149.332031 0 82.328125-66.988281 149.335938-149.332031 149.335938zm0 0" data-original="#000000" class="active-path" data-old_color="#000000" fill="#FFFFFF"/><path d="m197.332031 298.667969h-48c-82.34375 0-149.332031-67.007813-149.332031-149.335938 0-82.324219 66.988281-149.332031 149.332031-149.332031h48c8.832031 0 16 7.167969 16 16s-7.167969 16-16 16h-48c-64.703125 0-117.332031 52.652344-117.332031 117.332031 0 64.683594 52.628906 117.335938 117.332031 117.335938h48c8.832031 0 16 7.167969 16 16s-7.167969 16-16 16zm0 0" data-original="#000000" class="active-path" data-old_color="#000000" fill="#FFFFFF"/><path d="m325.332031 165.332031h-138.664062c-8.832031 0-16-7.167969-16-16s7.167969-16 16-16h138.664062c8.832031 0 16 7.167969 16 16s-7.167969 16-16 16zm0 0" data-original="#000000" class="active-path" data-old_color="#000000" fill="#FFFFFF"/></g> </svg>
        </a>
    </li>
</ul>
<script>
</script>
<style>
.share-buttons {
    font-size: 0.7rem;
    line-height: 0.7rem;
    letter-spacing: 1px;
    text-transform: uppercase;
    z-index: 2;
    position: relative;
    text-align: center;
    list-style-type: none;
    padding: 0;
    display: flex;
}

.share-buttons li {
    height: auto;
    width: 40px;
}

.share-buttons span {
    display: block;
}

.share-buttons svg {
    fill: #fff;
    margin-right: 5px;
    width: 16px;
    height: 16px;
}

.share-googleplus svg {
    width: 20px;
    height: 16px;
}

.share-buttons a {
    display: block;
    padding: 12px 12px 9px;
    text-align: center;
}

.share-buttons li:first-child a {
    border-radius: 3px 0 0 3px;
}

.share-buttons li:last-child a {
    border-radius: 0 3px 3px 0;
}

.share-twitter	{
    background: #1da1f2;
}

.share-facebook	{
    background: #3b5998;
}

.share-googleplus	{
    background: #db4437;
}

.share-link	{
    background: #000;
}

</style>