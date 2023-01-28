window.onload = function (){
    if(window.location.pathname === '/shop') {
        const search = document.getElementById('search_input')
        search.addEventListener("keyup", searchUpdate);
    }
}

const query = {};

function searchUpdate(){
    const search = document.getElementById('search_input')
    query.search = search.value;

    fetchProducts();
}

function sortUpdate() {
    const sort = document.getElementById('sort');
    query.sort = sort.value;

    fetchProducts();
}

function brandUpdate(){
    const brandId = document.querySelector('input[name="brand"]:checked');
    query.brandId = brandId.value;

    fetchProducts();
}

function categoryUpdate(){
    const categoryId = document.querySelector('input[name="category"]:checked');
    query.categoryId = categoryId.value;

    fetchProducts();
}

function genderUpdate() {
    const genderId = document.querySelector('input[name="gender"]:checked');
    query.genderId = genderId.value;

    fetchProducts();
}

function priceUpdate(){
    let lower = document.getElementById('lower-value').innerText
    let upper = document.getElementById('upper-value').innerText
    console.log(typeof lower)
    console.log(upper)
    query.lower = lower
    query.upper = upper

    fetchProducts();
}

// function paginationChange(response) {
//     let html =
//         `
//
//         `
//     let divs = document.getElementsByClassName('pagination')
//     for (const div of divs) {
//
//     }
// }

function fetchProducts(){
    $.ajax({
        url: 'api/articles',
        method: 'post',
        data: query,
        success(response){
            console.log(response)
            let html = "";
            let div = document.getElementById('articles');

            if (response.data && response.data.length) {
                for (const article of response.data) {
                    html += `
            <div class="col-lg-4 col-md-6">
                <div class="single-product">
                    <img class="img-fluid" src="${
                        article.image
                    }" alt="${article.name}">
                    <div class="product-details">
                        <h6>${article.name.toUpperCase()}</h6>
                        <div class="price">
                            `;
                    if (article.sale_price) {
                        html += `
                                <h6 class="text-danger">$${article.sale_price}</h6>
                                <h6 class="l-through">$${article.price}</h6>
                                `;
                    } else {
                        html += `
                                <h6>$${article.price}</h6>
                                `;
                    }
                    html += `
                        </div>
                        <div class="prd-bottom">

                            <a href="" class="social-info">
                                <span class="ti-bag"></span>
                                <p class="hover-text">add to bag</p>
                            </a>
                            <a href="shop/${article.id}" class="social-info">
                                <span class="lnr lnr-move"></span>
                                <p class="hover-text">view more</p>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        `;
                }
            } else {
                html = `<div class="container-fluid text-center mt-5 mb-5">
                <h4>There aren't any products with criterium you selected</h4>
            </div>`;
            }
            div.innerHTML = html;
        },
        error: function (e){
            console.log(e)
        }
    })
}

// async function fetchProducts() {
//
//     try {
//         const request = await fetch('api/articles', {
//             method: "POST",
//             body: query
//         });
//
//         const response = await request.json();
//         console.log(response)
//         let html = "";
//         let div = document.getElementById('articles');
//
//         if(response && response.length){
//             for(const article of response) {
//                 html += `
//                     <div class="col-lg-4 col-md-6">
//                         <div class="single-product">
//                             <img class="img-fluid" src="${article.image}" alt="${article.name}">
//                             <div class="product-details">
//                                 <h6>${article.name.toUpperCase()}</h6>
//                                 <div class="price">
//                                     `
//                                     if(article.sale_price) {
//                                         html +=
//                                         `
//                                         <h6 class="text-danger">$${article.sale_price}</h6>
//                                         <h6 class="l-through">$${article.price}</h6>
//                                         `
//                                     }
//                                     else {
//                                         html +=
//                                         `
//                                         <h6>$${article.price}</h6>
//                                         `
//                                     }
//                                     html += `
//                                 </div>
//                                 <div class="prd-bottom">
//
//                                     <a href="" class="social-info">
//                                         <span class="ti-bag"></span>
//                                         <p class="hover-text">add to bag</p>
//                                     </a>
//                                     <a href="shop/${article.id}" class="social-info">
//                                         <span class="lnr lnr-move"></span>
//                                         <p class="hover-text">view more</p>
//                                     </a>
//                                 </div>
//                             </div>
//                         </div>
//                     </div>
//                 `;
//             }
//         }else{
//             html =  `<div class="container-fluid text-center mt-5 mb-5">
//                         <h4>There aren't any products with criterium you selected</h4>
//                     </div>`
//         }
//         div.innerHTML = html;
//
//     } catch(e) {
//         console.log(e);
//     }
//
//
// }
