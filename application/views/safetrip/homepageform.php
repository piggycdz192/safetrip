<div class="form-group">
	<?php
		$this->load->helper("form");

		echo validation_errors();
		echo form_open("home/validate");
		
		$data = array(
			'type' => 'text',
			'name' => 'plateNum',
			'class' => "form-control",
			'placeholder' => "Examples: TXI-123 or Manong Juan or Bus Co."
		);

		echo form_input($data);
	?>
		 <p class="text-center">
		 <br>
		 <!-- creates two buttons -->
	<?php
		$data = array(
			'class' => "btn btn-primary btn-lg",
			'name' => 'report',
			'onclick' => "this.form.submit()"
			);
		echo form_button($data,'<span class="glyphicon glyphicon-exclamation-sign"></span> Report');
		
		$data = array(
			'class'=>"btn btn-primary btn-lg",
			'name' => "search"
			);

		echo anchor("",'<span class="glyphicon glyphicon-search"></span> Search',$data);

		echo form_close();

	?>	

		</p>
</div>

