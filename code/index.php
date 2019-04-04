<?php
    error_reporting(E_ALL);
    include dirname(__FILE__).'/Controllers/Home.php';
    
    $controller = new Home();

    if (!isset($_GET['act']))
    {   // Route to the home page w/o search results
        $controller->index(); 
    }else 
    {
        
        switch ($_GET['act']) 
        {
            case 'search':
                if(isset($_POST['number-input']) && $controller->cleanInput($_POST['number-input']))
                // Route to the home page w search results
                $controller->search($_POST['number-input']);
                else
                // Route to the home page w/o search results
                $controller->index();
                break;
            
            default:
                // Route to the home page w/o search results
                $controller->index();
                break;
        }   
    }
?>