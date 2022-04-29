<?php
/*****************************************************************************
//
// PHP MemCached Session Handler on memcache API
//
// Copyright ( C ) 2006 dozo, http://dozo.matrix.jp/pear/
// 
// This program is free software; you can redistribute it and/or
// modify it under the terms of the GNU General Public License
// as published by the Free Software Foundation; either version 2
// of the License, or ( at your option ) any later version.
// 
// This program is distributed in the hope that it will be useful,
// but WITHOUT ANY WARRANTY; without even the implied warranty of
// MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
// GNU General Public License for more details.
// 
// You should have received a copy of the GNU General Public License
// along with this program; if not, write to the Free Software
// Foundation, Inc., 59 Temple Place - Suite 330, Boston, MA  02111-1307, USA.
//
// *****************************************************************************/

/*
 * memcacheSession class
 *  Memcached session save handler main class.
 *  It can use that set session.save_path your memcached hostname or ipaddress and require this file.
 *
 * <code>
 *  ini_set("session.save_path", "localhost");
 *  require_once("memcacheSession.php");
 * </code>
 *
 * @Auther dozo
 *
 */

class memcacheSession extends Memcache
{
    /*
     *  memcached default host
     *
     * @access private
     *
     * @var string
     */
    var $sessionPath = "";

    /*
     *  session name
     *
     * @access private
     *
     * @var string
     */
    var $sessionName = "";


    /*
     *  constructor
     *
     * @access protected
     */
    function __construct()
    {
        session_set_save_handler(
            array( & $this, "open" ), 
            array( & $this, "close" ), 
            array( & $this, "read" ), 
            array( & $this, "write" ), 
            array( & $this, "destroy" ), 
            array( & $this, "gc" )
        );
//        session_module_name('user');
    }

    /*
     *  destructor
     *
     * @access protected
     */
    function __destruct()
    {
        ;
    }

    /*
     *  constructor
     *
     * @access protected
     */
    function memcacheSession()
    {
        $this->__construct();
    }
    /*
     *  singleton
     *
     * @access private
     */
    function &singleton()
    {
        static $instance;
        if (!isset($instance)) $instance = null;

        if (!is_object($instance)) {
            $instance = &memcacheSession::_factory();
//            $instance->addServer("localhost");
//            $instance->addServer("127.0.0.1");
        }

        return $instance;
    }
    
    /*
     *  factory
     *
     * @access private
     */
    function & _factory()
    {
        $memsessObj = new memcacheSession();

        return $memsessObj;
    }
    /*
     *  add Server over ride
     *
     * @access public
     */
//    function addServer( $host = "", $port = 11211, $persistent = true, $timeout = 1 )
//    {
//    }
    
    /**
     *  open memcached session save handler
     *
     * @access private
     *
     * @param   string  $save_path  memcached host name . If it don't setting server paramater, it's use configuration option "session.save_path".
     * @param   string  $session_name   session name
     *
     * @return bool true
     */
    function open($save_path, $session_name) 
    {
//        print_r( $this->getVersion() );
//        if(  ){
//            $this->addServer( $sess_save_path );
//        }
        $this->sessionPath = $save_path;
        $this->sessionName = $session_name;
        
        $this->addServer( $this->sessionPath );
        $this->pconnect( $this->sessionPath );
        
        return true;
    }

    function close() 
    {
        return(true);
    }

    function read( $id ) 
    {
        if ( $sess_data = $this->get( $id ) ) 
            return $sess_data;
        else 
            return(""); // Must return "" here.
    }

    function write( $id, $sess_data ) 
    {
        if( trim( $id ) == "" ) return 1;
        
        $session_life_time = ini_get("session.gc_maxlifetime");
        
        return $this->set( $id, $sess_data, 0, $session_life_time );
    }

    function destroy( $id ) 
    {
        return $this->delete( $id  );
    }

    /*********************************************
     * WARNING - You will need to implement some *
     * sort of garbage collection routine here.  *
     *********************************************/
    function gc($maxlifetime) 
    {
        return true;
    }

}

memcacheSession::singleton();

?>
