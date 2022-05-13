<!-- Change the `data-field` of buttons and `name` of input field's for multiple plus minus buttons-->
<div class="item">
  <h3>PLACEHOLDER NAME</h3>
  <img src="/assets/images/placeholder.png" alt="">
  <div class="input-group">
    <div class="input-button">
      <button type="button" class="circle left" data-quantity="minus" data-field="quantity">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
          <path d="M400 288h-352c-17.69 0-32-14.32-32-32.01s14.31-31.99 32-31.99h352c17.69 0 32 14.3 32 31.99S417.7 288 400 288z" />
        </svg>
      </button>
    </div>
    <input class="material-input" type="number" name="quantity" value="0">
    <div class="input-button">
      <button type="button" class="circle right" data-quantity="plus" data-field="quantity">
        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
          <path d="M432 256c0 17.69-14.33 32.01-32 32.01H256v144c0 17.69-14.33 31.99-32 31.99s-32-14.3-32-31.99v-144H48c-17.67 0-32-14.32-32-32.01s14.33-31.99 32-31.99H192v-144c0-17.69 14.33-32.01 32-32.01s32 14.32 32 32.01v144h144C417.7 224 432 238.3 432 256z" />
        </svg>
      </button>
    </div>
  </div>
</div>