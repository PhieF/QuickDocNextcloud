<?php
/**
 * @author Christoph Wurst <christoph@winzerhof-wurst.at>
 * @author Jan-Christoph Borchardt <hey@jancborchardt.net>
 * @author Thomas Imbreckx <zinks@iozero.be>
 * @author Thomas Müller <thomas.mueller@tmit.eu>
 *
 * Mail
 *
 * This code is free software: you can redistribute it and/or modify
 * it under the terms of the GNU Affero General Public License, version 3,
 * as published by the Free Software Foundation.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU Affero General Public License for more details.
 *
 * You should have received a copy of the GNU Affero General Public License, version 3,
 * along with this program.  If not, see <http://www.gnu.org/licenses/>
 *
 */
namespace OCA\Carnet\AppInfo;
use OCP\AppFramework\App;
use OCA\Mail\HordeTranslationHandler;
use OCA\Carnet\Hooks\FSHooks;
use OCP\Files\IRootFolder;
use OCP\Files\Node;
use OCP\AppFramework\IAppContainer;
use OCP\Util;
use OCP\IDBConnection;

if ((@include_once __DIR__ . '/../vendor/autoload.php')===false) {
	throw new Exception('Cannot include autoload. Did you run install dependencies using composer?');
}
class Application extends App {

    public function __construct(array $urlParams=array()){
        parent::__construct('carnet', $urlParams);
        $container = $this->getContainer();
        $container->registerService('Config', function($c) {

            return $c->query('ServerContainer')->getConfig();
        });
        $this->connectWatcher($container);
    }

    private function connectWatcher(IAppContainer $container) {
            /** @var IRootFolder $root */
            /*$root = $container->query(IRootFolder::class);
             $root->listen('\OC\Files', 'postWrite', function (Node $node) use ($container) {
                $c = $container->query('ServerContainer');
                $user = $c->getUserSession()->getUser();
                if($user != null){
                    $watcher = new FSHooks($c->getUserFolder(), $user->getUID(), $c->getConfig(), 'carnet',$container->query(IDBConnection::class));
                    $watcher->postWrite($node);
                 }
            });*/
    }
}
$app = new Application();

?>