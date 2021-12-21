function menu(e){
    $('#'+e).addClass('active');   
}

//slugify
function slugify(){
    let title = document.getElementById("title");
    let slug = document.getElementById("slug");
    let iklanSlug = document.getElementById("slug-iklan")
    function slugify(text) {
        return text.toString().toLowerCase()
                .replace(/\s+/g, '-')           // Replace spaces with -
                .replace(/[^\w\-]+/g, '')       // Remove all non-word chars
                .replace(/\-\-+/g, '-')         // Replace multiple - with single -
                .replace(/^-+/, '')             // Trim - from start of text
                .replace(/-+$/, '');            // Trim - from end of text
        }
    let today = new Date();
    let yyyy = today.getMilliseconds();
   
    today = yyyy;
        if (iklanSlug) {
            iklanSlug.value = slugify(title.value + "-" + today);
        }else{
            slug.value = slugify(title.value);
        }
     if(title.value.length == 0){
         iklanSlug.value = ""
     }

}
//preview single image 
function imagePreview(){
     const gambar = document.querySelector('#gambar')
    const label = document.querySelector('.gambar-label')
    const imgPrev = document.querySelector('.img-preview')
    if(label){
        label.textContent = gambar.files[0].name
    }
    const fileImage = new FileReader()
   fileImage.readAsDataURL(gambar.files[0])

    fileImage.onload = function(e){
        imgPrev.src = e.target.result
    }
}

document.addEventListener('DOMContentLoaded', function() {

let inputDashboard = document.getElementsByClassName('dashboard__input__gambar')
//folder
let pathImage = '/uploads/iklan/'
//nama gambar
let defaultIklan = 'prongiklan-addimage.png'
let noImage = 'no-image.png'  
let defaultImage = pathImage.concat(defaultIklan)
let showImage = document.getElementsByClassName('dashboard__show__gambar')
for (let i = 0; i < showImage.length; i++) {
    let parentShowImage = showImage[i].parentElement
    
    if (showImage[i].alt != defaultIklan && showImage[i].alt ) {
      
        let createSpan = document.createElement('span')
        createSpan.classList.add('delete__image__iklan')
        parentShowImage.getElementsByTagName("span")
        parentShowImage.parentElement.append(createSpan)
           
            let getDelete  = parentShowImage.parentElement.getElementsByClassName('delete__image__iklan')
            for (let i = 0; i < getDelete.length; i++) {
                
                getDelete[i].addEventListener("click",(e)=>{
                let getimg = e.target.parentElement
                let tmp = getimg.getElementsByClassName('old-image')
                let getsrc = getimg.getElementsByClassName('dashboard__show__gambar')
                //ubah hidden input gambar lama ke no-image
                tmp[0].value = noImage
                getsrc[0].src = defaultImage
                getDelete[0].remove()
            })
            }
    }
  
}
for (let i = 0; i < inputDashboard.length; i++) {
    inputDashboard[i].addEventListener("change",function(e) {
        let getInput = e.target
        let getParent = getInput.parentElement
        let getImage =getParent.getElementsByClassName('dashboard__show__gambar')[0]
        let createSpan = document.createElement('span')
        createSpan.classList.add('delete__image__iklan')
        getParent.getElementsByTagName("span")
        getParent.append(createSpan)
         const fileImage = new FileReader()
       
         fileImage.onload = function(event){
            getImage.src = event.target.result
            let tmp = getParent.getElementsByClassName('old-image')[0]
            
            tmp.value = getInput.files[0].name
            let getDelete  = getParent.getElementsByClassName('delete__image__iklan')[0]
            getDelete.addEventListener("click",(e)=>{
                tmp.value = noImage
                getImage.alt = ""
                getImage.src = defaultImage;
                getInput.value = ""
                getDelete.remove()
            })
         }
         fileImage.readAsDataURL(getInput.files[0])
    })
}
$('.slider-single').slick({
    slidesToShow: 1,
    slidesToScroll: 1,

    infinite: true,
   useTransform: true,
    speed: 400,
    cssEase: 'cubic-bezier(0.77, 0, 0.18, 1)',
});

$('.slider-nav')
    .on('init', function(event, slick) {
        $('.slider-nav .slick-slide.slick-current').addClass('is-active');
    })
    .slick({
        slidesToShow: 10,
        dots: false,
        focusOnSelect: false,
        infinite: false,
        responsive: [{
            breakpoint: 1024,
            settings: {
                slidesToShow: 5,
                slidesToScroll: 5,
            }
        }, {
            breakpoint: 640,
            settings: {
                slidesToShow: 4,
                slidesToScroll: 4,
           }
        }, {
            breakpoint: 420,
            settings: {
                slidesToShow: 3,
                slidesToScroll: 3,
       }
        }]
    });

$('.slider-single').on('afterChange', function(event, slick, currentSlide) {
    $('.slider-nav').slick('slickGoTo', currentSlide);
    var currrentNavSlideElem = '.slider-nav .slick-slide[data-slick-index="' + currentSlide + '"]';
    $('.slider-nav .slick-slide.is-active').removeClass('is-active');
    $(currrentNavSlideElem).addClass('is-active');
});

$('.slider-nav').on('click', '.slick-slide', function(event) {
    event.preventDefault();
    var goToSingleSlide = $(this).data('slick-index');

    $('.slider-single').slick('slickGoTo', goToSingleSlide);
});


}, false);

