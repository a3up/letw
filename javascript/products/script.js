// ----------------------------------------------------------------
// exercise 2
// ----------------------------------------------------------------

// opens a pop-up with a message
function hello_world() {
    alert('hello world!')
}

// ----------------------------------------------------------------
// exercise 3
// ----------------------------------------------------------------

// writes the content of the products table when it's called, does not verify if the page is loaded
// - can be used when script uses defer, so this script is only called when the page is loaded
function log_products_table() {
    let products = document.getElementById('products')
    console.log(products)
}

// adds a listener to write the products table in the console after the page is loaded
function log_products_table_after_load() {
    window.addEventListener('load', function () {
        let products = document.getElementById('products')
        console.log(products)
    })
}

// ----------------------------------------------------------------
// exercise 4
// ----------------------------------------------------------------

// prints some inputs of the form
function log_form_inputs() {
    let form = document.getElementsByTagName('form')[0]

    // logs second input of form
    let second_input = form.querySelector("label:nth-child(2) input")
    console.log(second_input)

    // logs all inputs of the form
    let all_inputs = form.querySelectorAll("input")
    for (const input of all_inputs)
        console.log(input)
}

// ----------------------------------------------------------------
// exercise 5
// ----------------------------------------------------------------

// adds a listener to open a pop-up when the form is submitted
function alert_after_submit() {
    let form = document.getElementsByTagName('form')[0]
    form.addEventListener('submit', function () {
        alert('Submitted!')
        event.preventDefault()
    })
}
