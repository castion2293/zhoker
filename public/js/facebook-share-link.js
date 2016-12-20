FB.init({
    appId  : 702908419859435,
});
   
document.getElementById('shareBtn').onclick = function() {
    FB.ui({
        method: 'share',
        display: 'popup',
        href: 'https://zhoker.com/product/eyJpdiI6Im1ka3BJMHBzYUFSUGhuYmRaM2pSTXc9PSIsInZhbHVlIjoicG02dm52YkJTc1JQeUdmc3hhY0RtZz09IiwibWFjIjoiYmNmYzU0ZmM3YmNkY2YxMjFlM2FhMmZhMTYxYjA5MThjY2ViMmQ4Y2JmNTJlMzdkZDZiMjdmYzI5NjgzYjg5MyJ9/eyJpdiI6IitiQU9GUE1wUlVSNWJRV3ZIaURZMUE9PSIsInZhbHVlIjoiVHNwdmJUdjhEXC9GUUVqU2VEd0V6c3c9PSIsIm1hYyI6ImUwYjE4MTc1NGE0MGVjZWJmYWU4MzFmYTVjNzJmOWFlYzgyOGIzZDdlMjE3ZjIwMDM3ZDIzY2Y3ODg1ZTM4ODQifQ==',
    }, function(response){});
}