<style>
  #tracking {
    background: #14746d;
    margin-left: 500px;
    width: 40%;
    border-radius: 15px;
  }

  .tracking-detail {
    padding: 3rem 0;
  }

  [class*="tracking-status-"] p {
    margin: 0;
    font-size: 1.1rem;
    color: #fff;
    text-transform: uppercase;
    text-align: center;
  }

  [class*="tracking-status-"] {
    padding: 1.6rem 0;
  }

  .tracking-list {
    border: 1px solid #e5e5e5;
    height: 70%;
    border-radius: 15px;
  }

  .tracking-item {

    height: 20%;
    border-left: 4px solid #00ba0d;
    position: relative;
    padding: 2rem 1.5rem 0.5rem 2.5rem;
    font-size: 0.9rem;
    margin-left: 3rem;
    min-height: 5rem;
  }

  .tracking-item:last-child {
    padding-bottom: 4rem;
  }

  .tracking-item .tracking-date {
    margin-bottom: 0.5rem;
  }

  .tracking-item .tracking-date span {
    color: #888;
    font-size: 85%;
    padding-left: 0.4rem;
  }

  .tracking-item .tracking-content {
    padding: 0.5rem 0.8rem;
    background-color: #f4f4f4;
    border-radius: 0.5rem;
  }

  .tracking-item .tracking-content span {
    display: block;
    color: #767676;
    font-size: 13px;
  }

  .tracking-item .tracking-icon {
    position: absolute;
    left: -0.7rem;
    width: 1.1rem;
    height: 1.1rem;
    text-align: center;
    border-radius: 50%;
    font-size: 1.1rem;
    background-color: #fff;
    color: #fff;
  }

  .tracking-item-pending {
    border-left: 4px solid #d6d6d6;
    position: relative;
    padding: 2rem 1.5rem 0.5rem 2.5rem;
    font-size: 0.9rem;
    margin-left: 3rem;
    min-height: 5rem;
  }

  .tracking-item-pending:last-child {
    padding-bottom: 4rem;
  }

  .tracking-item-pending .tracking-date {
    margin-bottom: 0.5rem;
  }

  .tracking-item-pending .tracking-date span {
    color: #888;
    font-size: 85%;
    padding-left: 0.4rem;
  }

  .tracking-item-pending .tracking-content {
    padding: 0.5rem 0.8rem;
    background-color: #f4f4f4;
    border-radius: 0.5rem;
  }

  .tracking-item-pending .tracking-content span {
    display: block;
    color: #767676;
    font-size: 13px;
  }

  .tracking-item-pending .tracking-icon {
    line-height: 2.6rem;
    position: absolute;
    left: -0.7rem;
    width: 1.1rem;
    height: 1.1rem;
    text-align: center;
    border-radius: 50%;
    font-size: 1.1rem;
    color: #d6d6d6;
  }

  .tracking-item-pending .tracking-content {
    font-weight: 600;
    font-size: 17px;
  }

  .tracking-item .tracking-icon.status-current {
    width: 1.9rem;
    height: 1.9rem;
    left: -1.1rem;
  }

  .tracking-item .tracking-icon.status-intransit {
    color: #00ba0d;
    font-size: 0.6rem;
  }

  .tracking-item .tracking-icon.status-current {
    color: #00ba0d;
    font-size: 0.6rem;
  }

  @media (min-width: 992px) {
    .tracking-item {
      margin-left: 10rem;
    }

    .tracking-item .tracking-date {
      position: absolute;
      left: -10rem;
      width: 7.5rem;
      text-align: right;
    }

    .tracking-item .tracking-date span {
      display: block;
    }

    .tracking-item .tracking-content {
      padding: 0;
      background-color: transparent;
    }

    .tracking-item-pending {
      margin-left: 10rem;
    }

    .tracking-item-pending .tracking-date {
      position: absolute;
      left: -10rem;
      width: 7.5rem;
      text-align: right;
    }

    .tracking-item-pending .tracking-date span {
      display: block;
    }

    .tracking-item-pending .tracking-content {
      padding: 0;
      background-color: transparent;
    }
  }

  .tracking-item .tracking-content {
    font-weight: 600;
    font-size: 17px;
  }

  .blinker {
    border: 7px solid #7d1e47;
    animation: blink 1s;
    animation-iteration-count: infinite;
    border-radius: 15px;
  }

  .containerorder {
    height: 80%;
    border-radius: 15px;
  }

  @keyframes blink {
    50% {
      border-color: #fff;
    }
  }
</style>


<br>
<br>
<div class="containerorder">
  <div class="row">

    <div class="col-md-12 col-lg-12">
      <div id="tracking-pre"></div>
      <div id="tracking">
        <div class="tracking-list">
          <div class="tracking-item">
            <div class="tracking-icon status-intransit">
              <svg class="svg-inline--fa fa-circle fa-w-16" aria-hidden="true" data-prefix="fas" data-icon="circle"
                role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                <path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z">
                </path>
              </svg>
            </div>
            <div class="tracking-date"><img
                src="https://raw.githubusercontent.com/shajo/portfolio/a02c5579c3ebe185bb1fc085909c582bf5fad802/delivery.svg"
                class="img-responsive" alt="order-placed" /></div>
            <div class="tracking-content">Order Placed</div>
          </div>
          <div <?php if($orderDetails[0]->state==5){ ?> class="tracking-item-pending"  <?php }else{?> class="tracking-item" <?php } ?>>
            <div  <?php if($orderDetails[0]->state==1){ ?> class="tracking-icon status-current blinker" <?php }else{?> class="tracking-icon status-intransit"   <?php } ?>>
              <svg class="svg-inline--fa fa-circle fa-w-16" aria-hidden="true" data-prefix="fas" data-icon="circle"
                role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                <path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z">
                </path>
              </svg>
            </div>
            <div class="tracking-date"><img
                src="https://raw.githubusercontent.com/shajo/portfolio/a02c5579c3ebe185bb1fc085909c582bf5fad802/delivery.svg"
                class="img-responsive" alt="order-placed" /></div>
            <div class="tracking-content">Order Confirmed</div>
          </div>
          <div <?php if($orderDetails[0]->state==1||$orderDetails[0]->state==2||$orderDetails[0]->state==3||$orderDetails[0]->state==4||$orderDetails[0]->state==6||$orderDetails[0]->state==-1){ ?> class="tracking-item" <?php }else{?> class="tracking-item-pending"  <?php } ?>>
            <div  <?php if($orderDetails[0]->state==1){ ?> class="tracking-icon status-current blinker" <?php }else{?> class="tracking-icon status-intransit"   <?php } ?>>
              <svg class="svg-inline--fa fa-circle fa-w-16" aria-hidden="true" data-prefix="fas" data-icon="circle"
                role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                <path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z">
                </path>
              </svg>
            </div>
            <div class="tracking-date"><img
                src="https://raw.githubusercontent.com/shajo/portfolio/a02c5579c3ebe185bb1fc085909c582bf5fad802/delivery.svg"
                class="img-responsive" alt="order-placed" /></div>
            <div class="tracking-content">Prepared in warehouse</div>
          </div>
          <div <?php if($orderDetails[0]->state==2||$orderDetails[0]->state==3||$orderDetails[0]->state==4||$orderDetails[0]->state==6||$orderDetails[0]->state==-1){ ?> class="tracking-item" <?php }else{?> class="tracking-item-pending"  <?php } ?>>
            <div <?php if($orderDetails[0]->state==2){ ?> class="tracking-icon status-current blinker" <?php }else{?> class="tracking-icon status-intransit"   <?php } ?> >
              <svg class="svg-inline--fa fa-circle fa-w-16" aria-hidden="true" data-prefix="fas" data-icon="circle"
                role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                <path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z">
                </path>
              </svg>
            </div>
            <div class="tracking-date"><img
                src="https://raw.githubusercontent.com/shajo/portfolio/a02c5579c3ebe185bb1fc085909c582bf5fad802/delivery.svg"
                class="img-responsive" alt="order-placed" /></div>
            <div class="tracking-content">Waiting for a delivery person</div>
          </div>
          <div <?php if($orderDetails[0]->state==3||$orderDetails[0]->state==4||$orderDetails[0]->state==6||$orderDetails[0]->state==-1){ ?> class="tracking-item" <?php }else{?> class="tracking-item-pending"  <?php } ?>>
            <div <?php if($orderDetails[0]->state==3){ ?> class="tracking-icon status-current blinker" <?php }else{?> class="tracking-icon status-intransit"   <?php } ?> >
              <svg class="svg-inline--fa fa-circle fa-w-16" aria-hidden="true" data-prefix="fas" data-icon="circle"
                role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                <path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z">
                </path>
              </svg>
            </div>
            <div class="tracking-date"><img
                src="https://raw.githubusercontent.com/shajo/portfolio/a02c5579c3ebe185bb1fc085909c582bf5fad802/delivery.svg"
                class="img-responsive" alt="order-placed" /></div>
            <div class="tracking-content">On the way to you</div>
          </div>

          <div <?php if($orderDetails[0]->state==4||$orderDetails[0]->state==6||$orderDetails[0]->state==-1){ ?> class="tracking-item" <?php }else{?> class="tracking-item-pending"  <?php } ?>>
            <div <?php if($orderDetails[0]->state==4||$orderDetails[0]->state==6||$orderDetails[0]->state==-1){ ?> class="tracking-icon status-current blinker" <?php }else{?> class="tracking-icon status-intransit"   <?php } ?>>
              <svg class="svg-inline--fa fa-circle fa-w-16" aria-hidden="true" data-prefix="fas" data-icon="circle"
                role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                <path fill="currentColor" d="M256 8C119 8 8 119 8 256s111 248 248 248 248-111 248-248S393 8 256 8z">
                </path>
              </svg>
            </div>
            <div class="tracking-date"><img
                src="https://raw.githubusercontent.com/shajo/portfolio/a02c5579c3ebe185bb1fc085909c582bf5fad802/delivery.svg"
                class="img-responsive" alt="order-placed" /></div>
            <div class="tracking-content">Delivered</div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<table class="content-table2">
  <thead>
    <tr>
      <th>Total Price: <?php echo  $orderDetails[0]->price.'$'?> </th>
      
      <th><a  href="<?php echo URL . 'orders/orderContains/'.$orderDetails[0]->Cart_id.'/'.$orderDetails[0]->id;?>" class="btn_del"><span>Contents of the Order</span></th>
    </tr>
  </thead>
  <style>
    .content-table2 {
      border-collapse: collapse;
      margin-top: 20px;
      margin-left: 260px;
      font-size: 1.3em;
      min-width: 1000px;
      border-radius: 5px 5px 0 0;
      overflow: hidden;
      box-shadow: 0 0 20px rgba(0, 0, 0, 0.15);
    }

    .content-table2 thead tr {
      background: #8ae77b;
      color: #ffffff;
      text-align: left;
      font-weight: bold;
    }

    .content-table2 th,
    .content-table2 td {
      padding: 12px 15px;
    }
  </style>