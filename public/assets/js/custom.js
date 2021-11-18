

//slugify
function slugify(){
    let title = document.getElementById("title");
    let slug = document.getElementById("slug");
    
    function slugify(text) {
        return text.toString().toLowerCase()
                .replace(/\s+/g, '-')           // Replace spaces with -
                .replace(/[^\w\-]+/g, '')       // Remove all non-word chars
                .replace(/\-\-+/g, '-')         // Replace multiple - with single -
                .replace(/^-+/, '')             // Trim - from start of text
                .replace(/-+$/, '');            // Trim - from end of text
        }
    
       
    slug.value = slugify(title.value);
        
}


//preview-image

function  imagePreview(){
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