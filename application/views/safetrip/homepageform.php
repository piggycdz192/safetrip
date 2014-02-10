<div class="form-group">
	<?php
		$this->load->helper("form");

		echo validation_errors();
		echo form_open("index.php/validate");
		
		$data = array(
			'type' => 'text',
			'id' => 'plateNum',
			'class' => "form-control",
			'placeholder' => "Examples: TXI-123 or Manong Juan or Bus Co.",
		);

		echo form_input($data);
	?>
		 <p class="text-center">
		 <br>
		 <!-- creates two buttons -->
	<?php
		$data = array(
			'class' => "btn btn-primary btn-lg",
			'id' => "btnReport",
			'role' => "button",
			);
		echo anchor("create", '<span class="glyphicon glyphicon-exclamation-sign"></span> Report', $data);
		
		$data = array(
			'class'=>"btn btn-primary btn-lg",
			'id' => "btnSearch",
			'role'=> "button",
			);
		echo anchor("view",'<span class="glyphicon glyphicon-search"></span> Search',$data);

		echo form_close();

	?>	

		</p>
</div>

