
<section class="contact_section layout_padding">
    <div class="container">

      <h2 class="main-heading">
        Contact Now

      </h2>
      <p class="text-center">
        Contact us for Admissions or any other query

      </p>
      <div class="">
        <div class="contact_section-container">
          <div class="row">
            <div class="col-md-6 mx-auto">
              <div class="contact-form" id="contact-form">
                <form action="process_contact" method="post">
                @csrf
                  <div>
                    <input type="text" placeholder="Name" name="name">
                    @error('name')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div>
                    <input type="text" placeholder="Phone Number" name="phone">
                    @error('phone')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div>
                    <input type="email" placeholder="Email" name="email">
                    @error('email')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div>
                    <input type="text" placeholder="Message" class="input_message" name="message">
                    @error('message')
                    <div class="text-danger">{{ $message }}</div>
                    @enderror
                  </div>
                  <div class="d-flex justify-content-center">
                    <button type="submit" class="btn_on-hover">
                      Send
                    </button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>

    </div>
  </section>

