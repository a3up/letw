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

// ----------------------------------------------------------------
// exercise 6
// ----------------------------------------------------------------

function update_total(add) {
    let total = document.getElementById('total')
    total.innerHTML = parseInt(total.innerHTML) + add
}

// adds a listener that adds the element to the table when the form is submitted
function add_to_table_after_submit() {
    let form = document.getElementsByTagName('form')[0]
    form.addEventListener('submit', function () {
        // create table cells
        let cells = []
        for (let i = 0; i < 3; i++)
            cells.push(document.createElement('td'))

        // get the values of the inputs
        let quantity = parseInt(this.querySelector('label input[name="quantity"]').value)

        // assign the form values to the cells
        cells[0].innerHTML = this.querySelector('label input[name="description"]').value
        cells[1].innerHTML = '<input value="' + quantity + '">'
        cells[2].innerHTML = '<input type="button" value="Remove">'

        // append cells to row
        let row = document.createElement('tr')
        for (let i = 0; i < 3; i++)
            row.append(cells[i])

        // append row to products table
        let products = document.getElementById('products')
        products.append(row)

        // update total
        update_total(quantity)

        //
        cells[1].addEventListener('change', function () {
            let new_quantity = parseInt(cells[1].querySelector('input').value)
            update_total(new_quantity - quantity)
            quantity = new_quantity
        })

        // when the button 'remove' is clicked the row is removed
        cells[2].addEventListener('click', function () {
            row.remove()
            update_total(-quantity)
        })

        // prevent default action
        event.preventDefault()
    })
}

add_to_table_after_submit()
