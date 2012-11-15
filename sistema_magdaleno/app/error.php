<?php

class AppError extends ErrorHandler {


        function missingController($params) {
			//echo "pase por aqui";
			$this->controller->layout = "errors";
			//parent::missingController($params);
			//echo "pase por aqui fin";
			$this->controller->redirect('/');
        }

       
        function missingAction($params) {
			//echo "pase por aqui";
			$this->controller->layout = "errors";
			//parent::missingAction($params);
			$this->controller->redirect('/');
			//echo "pase por aqui fin";
        }

         function missingView($params) {
			//echo "pase por aqui";
			$this->controller->layout = "errors";
			//parent::missingView($params);
			$this->controller->redirect('/');
			//echo "pase por aqui fin";
        }

        function error404($params) {
			//echo "pase por aqui";
			$this->controller->layout = "errors";
			//parent::error404($params);
			$this->controller->redirect('/');
			//echo "pase por aqui fin";
		}

}

?>
