
//Izvlacimo ime stranice iz url: http://localhost:8000/admin/categories

//Ovim dobijamo [ "http:", "", "localhost:8000", "admin", "categories" ]
const split = document.URL.split('/');
//treba nam poslednji element "categories", koji cemo koristiti za update i delete prostih tabela
const page = split[split.length-1];

