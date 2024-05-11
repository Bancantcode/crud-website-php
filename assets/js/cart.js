function incrementQuantity(productId) 
{
    var quantityElement = document.querySelector(`#quantity_${productId}`);
    var quantity = parseInt(quantityElement.textContent);
    quantity++;
    quantityElement.textContent = quantity;
    document.getElementById(`quantity_input_${productId}`).value = quantity;
    document.getElementById(`cart_form_${productId}`).submit();
}

function decrementQuantity(productId) 
{
    var quantityElement = document.querySelector(`#quantity_${productId}`);
    var quantity = parseInt(quantityElement.textContent);
    if (quantity > 1) 
    {
        quantity--;
        quantityElement.textContent = quantity;
        document.getElementById(`quantity_input_${productId}`).value = quantity;
        document.getElementById(`cart_form_${productId}`).submit();
    } 
    else if (quantity === 1) 
    {
        quantityElement.textContent = quantity;
        document.getElementById(`quantity_input_${productId}`).value = quantity;
        document.getElementById(`cart_form_${productId}`).submit();
    }
}

document.getElementById('toggle-cart').addEventListener('click', function() 
{
    var cartSection = document.getElementById('cart-section');
    if (cartSection.classList.contains('show')) 
    {
        cartSection.classList.remove('show');
    } 
    else 
    {
        cartSection.classList.add('show');
    }
});