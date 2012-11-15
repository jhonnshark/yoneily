<?php
/**
 * MeioUpload Behavior
 * 
 * This behavior is designed to work with the JeMeioUpload Behaviour which extends Juan Basso's version
 * http://github.com/jrbasso/MeioUpload/tree/master
 *  of Vincius Mendes'  MeioUpload Behavior
 *  (http://www.meiocodigo.com/projects/meioupload/)
 * Which is in turn based upon Tane Piper's improved uplaod behavior
 *  (http://digitalspaghetti.tooum.net/switchboard/blog/2497:Upload_Behavior_for_CakePHP_12)
 * 
 * @author John Elliott http://www.flipflops.org
 * @package app
 * @subpackage app.models.behaviors
 * @filesource http://github.com/josegonzalez/MeioUpload/tree/master
 * @version 1.0
 * @lastmodified 2009-06-29
 *
 * Overview:
 * This behaviour extends the MeioUpload Behaviour and is designed to add several 
 * features to this behaviour. It is designed to be used in a Polymorphic Context 
 * where uploads for all the models in your system are stored in a single
 * uploads table and any variants (e.g. Thumbnails) are stored in a seperate table
 * the polymorphic association is uses the fields 'class' and 'foreign_id' to refernce the 
 * assocaited table where 'class' is the associated model name e.g. Product
 * 
 */
class JeMeioUploadPolymorphicBehavior extends ModelBehavior {
	
	/**
	 * The default Model containing the Uploads
	 *
	 * @var string
	 */
	var $uploadModel = 'Upload';
	
	/**
	 * Check if any file(s) are being uploaded if so we can attach process these
	 * Wait till afterSave so we can get the id of the inserted object to use as the foreign_key
	 * 
	 *
	 * @param object $model
	 */
	public function afterSave(&$model){
			
			if(isset($model->data[$this->uploadModel])){
				
				if(isset($model->jeMeioUploadParams)){
					$model->{$this->uploadModel}->Behaviors->attach('JeMeioUpload', $model->jeMeioUploadParams);
				} else {
					// use the default meio_upload_paramaters
				}
					
				if(isset($model->data[$this->uploadModel]['filename'])){
					
					$model->data[$this->uploadModel]['class'] = $model->name;
					$model->data[$this->uploadModel]['foreign_id'] = $model->id;
					$model->{$this->uploadModel}->save($model->data[$this->uploadModel]);
					
				} else {
					
					foreach($model->data[$this->uploadModel] as $upload => $value){
						
						// reset the model ready for a save
						$model->{$this->uploadModel}->create();
						
						// only process the upload if it has actually been uploaded
						// becuase if we have a form with the option to upload 10 images 
						// we might only upload 3
						if(!empty($value['filename']['name'])){
							$value['class'] = $model->name;
							$value['foreign_id'] = $model->id;
							$model->{$this->uploadModel}->save($value);					
						}						
					}			
				}			
			}		
		}
}

?>