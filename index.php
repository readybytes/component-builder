<?php 

class JCB{
	
	public $base 	= __FILE__;
	public $package = '';
	public $src 	= '';
	public $files 	= '';
	public function __construct()
	{
		$this->base = dirname($this->base);
		$this->package = $this->base.'/package';
		$this->src = $this->base.'/xml'; 		
	}
	
	public function create()
	{
		// unlink a foler
		rmdir($this->package.'/'.$this->name);
		// create a folder 
		mkdir($this->package.'/'.$this->name, 0777);
		
		$this->_create_xml($this->name);
		
		// create admin controllers
		mkdir($this->package.'/'.$this->name.'/admin', 0777);		
		file_put_contents($this->package.'/'.$this->name.'/admin/index.html', '<html></html>');
		$this->_create_files('admin', 'controllers', $this->entities);
		
		// create site controllers
		mkdir($this->package.'/'.$this->name.'/site', 0777);
		file_put_contents($this->package.'/'.$this->name.'/site/index.html', '<html></html>');
		$this->_create_files('site', 'controllers', $this->entities);
		
		$this->_create_base_files();
		
		// site libs
		$this->_create_files('site', 'libs', $this->entities, false, true);
		
		// site models
		$this->_create_files('site', 'models', $this->entities, false, true);

		// site tables
		$this->_create_files('site', 'tables', $this->entities, false, true);		
		
		// site helpers
		$this->_create_files('site', 'helpers', $this->entities);
		
		// admin views
		$this->_create_views('admin',$this->entities);
		
		// site views
		$this->_create_views('site',$this->entities);
		
		// admin templates
		$this->_create_tmpl('admin',$this->entities);
		
		// site templates
		$this->_create_tmpl('site',$this->entities);
		
		// other files
		$this->_create_others_files();
		$this->_create_language_file();
	}
	
	protected function _create_views($for, $entities)
	{
		$type = 'views';
		
		$dest_path = $this->package.'/'.$this->name.'/'.$for.'/'.$type;
		if(!is_dir($dest_path)){
			mkdir($dest_path, 0777);
			file_put_contents($dest_path.'/index.html', '<html></html>');
		}
		
		$src_path = $this->src.'/'.$for.'/'.$type.'.php';
		$base_view = $this->src.'/'.$for.'/view.php';
		$core_contents = file_get_contents($src_path);
		$base_contents = file_get_contents($base_view);
		
		foreach($entities as $entity){
			$content = str_replace('@name@', ucfirst($entity), $core_contents);
			$content = str_replace('@prefix@', ucfirst($this->prefix), $content);
			$content = $this->_replace_header_token($content);
			mkdir($dest_path.'/'.$entity, 0777);
			file_put_contents($dest_path.'/'.$entity.'/index.html', '<html></html>');
			file_put_contents($dest_path.'/'.$entity.'/view.html.php', $content);
			
			$content = str_replace('@name@', ucfirst($entity), $base_contents);
			$content = str_replace('@prefix@', ucfirst($this->prefix), $content);
			$content = $this->_replace_header_token($content);
			file_put_contents($dest_path.'/'.$entity.'/view.php', $content);			
		}
	}	
	
	protected function _create_tmpl($for, $entities, $tmpl_name = 'default')
	{
		$type = 'templates';
		
		$dest_path = $this->package.'/'.$this->name.'/'.$for.'/'.$type;
		if(!is_dir($dest_path)){
			mkdir($dest_path, 0777);
			file_put_contents($dest_path.'/index.html', '<html></html>');
		}
		
		$dest_path .= '/'.$tmpl_name;
		if(!is_dir($dest_path)){
			mkdir($dest_path, 0777);
		}
		
		$src_path = $this->src.'/'.$for.'/'.$type.'.php';
		$core_contents = file_get_contents($src_path);
		
		foreach($entities as $entity){
			$content = str_replace('@name@', ucfirst($entity), $core_contents);			
			$content = $this->_replace_header_token($content);
			mkdir($dest_path.'/'.$entity, 0777);
			file_put_contents($dest_path.'/'.$entity.'/index.html', '<html></html>');
			file_put_contents($dest_path.'/'.$entity.'/default.php', $content);
		}
	}	
	
	protected function _create_others_files()
	{
		$entities['/site/defines.php'] = '/site/'.$this->name.'/defines.php';
		$entities['/site/includes.php'] = '/site/'.$this->name.'/includes.php';
		$entities['/site/loader.php'] = '/site/'.$this->name.'/loader.php';
		$entities['/site/entry.php'] = '/site/'.$this->name.'.php';
		$entities['/admin/entry.php'] = '/admin/'.$this->name.'.php';
		
		foreach($entities as $src => $dest){
			$src_path = $this->src.$src;
			$content = file_get_contents($src_path);		
			$content = str_replace('@name@', $this->name, $content);
			$content = str_replace('@prefix@', ucfirst($this->prefix), $content);
			$content = str_replace('@extendprefix@', ucfirst($this->extendprefix), $content);
			$content = str_replace('@prefix_constant@', strtoupper($this->prefix_constant), $content);
			$content = str_replace('@extendprefix_constant@', strtoupper($this->extendprefix_constant), $content);			
			$content = $this->_replace_header_token($content);			
			file_put_contents($this->package.'/'.$this->name.'/'.$dest, $content);
		}
	}
	
	protected function _create_base_files()
	{
		$dest_path = $this->package.'/'.$this->name.'/site';		
		$dest_path .= "/".$this->name;
		if(!is_dir($dest_path)){
			mkdir($dest_path, 0777);
			file_put_contents($dest_path.'/index.html', '<html></html>');
		}		
		
		$dest_path .= '/base';
		if(!is_dir($dest_path)){
			mkdir($dest_path, 0777);
			file_put_contents($dest_path.'/index.html', '<html></html>');
		}	
		$entities = array('controller', 'model', 'table', 'helper', 'lib', 'view');
		foreach($entities as $entity){
			$src_path = $this->src.'/site/base/'.$entity.'.php';
			$content = file_get_contents($src_path);		
			$content = str_replace('@name@', ucfirst($entity), $content);
			$content = str_replace('@prefix@', ucfirst($this->prefix), $content);
			$content = str_replace('@extendprefix@', ucfirst($this->extendprefix), $content);
			$content = $this->_replace_header_token($content);			
			file_put_contents($dest_path.'/'.$entity.'.php', $content);
		}
	}
	
	protected function _create_files($for, $type, $entities, $add_prefix = false, $shareable = false)
	{
		$dest_path = $this->package.'/'.$this->name.'/'.$for;
		
		if($shareable){
			$dest_path .= "/".$this->name;
			if(!is_dir($dest_path)){
				mkdir($dest_path, 0777);
				file_put_contents($dest_path.'/index.html', '<html></html>');
			}
		}
		
		$dest_path .= '/'.$type;
		if(!is_dir($dest_path)){
			mkdir($dest_path, 0777);
			file_put_contents($dest_path.'/index.html', '<html></html>');
		}		
		
		$src_path = $this->src.'/'.$for.'/'.$type.'.php';
		$core_contents = file_get_contents($src_path);
		
		foreach($entities as $entity){
			$content = str_replace('@name@', ucfirst($entity), $core_contents);
			$content = str_replace('@prefix@', ucfirst($this->prefix), $content);
			$content = $this->_replace_header_token($content);			
			file_put_contents($dest_path.'/'.$entity.'.php', $content);
		}
	}
	
	protected function _create_xml($name)
	{
		$content = file_get_contents(dirname(__FILE__).'/xml/component.xml');
		$content = str_replace('@name@', $this->name, $content);	
		$content = $this->_replace_header_token($content);

		$folders = array('controllers', 'views', 'templates');
		$files   = array('index.html', $this->name.'.php');
		$token  = '<filename>'.implode("</filename>\n<filename>", $files).'</filename>';
		$token .= "\n<folder>".implode("</folder>\n<folder>", $folders)."</folder>";
		$content = str_replace('@adminFolders@', $token, $content);

		$folders = array('controllers', 'views', 'templates', 'helpers', $this->name);
		$files   = array('index.html', $this->name.'.php');
		$token  = '<filename>'.implode("</filename>\n<filename>", $files).'</filename>';
		$token .= "\n<folder>".implode("</folder>\n<folder>", $folders)."</folder>";
		$content = str_replace('@siteFolders@', $token, $content);
		
		file_put_contents($this->package.'/'.$this->name.'/'.$this->name.'.xml', $content);
	}
	
	protected function _replace_header_token($content)
	{
		$content = str_replace('@name@', 		ucfirst($this->name), $content);
		$content = str_replace('@prefix@', 		ucfirst($this->prefix), $content);
		$content = str_replace('@copyright@', 	ucfirst($this->copyright), $content);
		$content = str_replace('@license@', 	ucfirst($this->license), $content);
		$content = str_replace('@creationDate@',ucfirst($this->creationDate), $content);
		$content = str_replace('@authorEmail@', ucfirst($this->authorEmail), $content);
		$content = str_replace('@authorUrl@', 	ucfirst($this->authorUrl), $content);
		$content = str_replace('@author@', 		ucfirst($this->author), $content);
		$content = str_replace('@description@',	ucfirst($this->description), $content);
		return $content;
	}	
	
	protected function _create_language_file()
	{
		mkdir($this->package.'/'.$this->name.'/languages', 0777);
		file_put_contents($this->package.'/'.$this->name.'/languages/index.html', '<html></html>');
		mkdir($this->package.'/'.$this->name.'/languages/admin', 0777);
		file_put_contents($this->package.'/'.$this->name.'/languages/admin/index.html', '<html></html>');
		file_put_contents($this->package.'/'.$this->name.'/languages/admin/en-GB.com_'.$this->name.'.ini', ';');
		file_put_contents($this->package.'/'.$this->name.'/languages/admin/en-GB.com_'.$this->name.'.sys.ini', ';');
		mkdir($this->package.'/'.$this->name.'/languages/site', 0777);
		file_put_contents($this->package.'/'.$this->name.'/languages/site/index.html', '<html></html>');
		file_put_contents($this->package.'/'.$this->name.'/languages/site/en-GB.com_'.$this->name.'.ini', ';');		
	}
} 


$jcb = new JCB();
$jcb->name = 'builder';
$jcb->prefix = 'Builder';
$jcb->prefix_constant = 'BUILDER';
$jcb->extendprefix = 'Rb_';
$jcb->extendprefix_constant = 'RB';
$jcb->copyright = "Gaurav Jain";
$jcb->author = "Gaurav Jain";
$jcb->authorUrl = "gaurav-jain.in";
$jcb->authorEmail = "gaurav.jain028@gmail.com";
$jcb->creationDate = date("jS M Y");
$jcb->license = "GNU GPL 3";
$jcb->description = "Joomla Component Builder";
$jcb->entities = array('invoice', 'transaction'); 
$jcb->create();

//controller  admin/site				
//model		
//view		admin/site
//template	admin/site****
//helper		
//lib			
//table
//modelform

