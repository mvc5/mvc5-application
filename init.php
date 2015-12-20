<?php
/**
 *
 */
include __DIR__ . '/vendor/symfony/http-foundation/Symfony/Component/HttpFoundation/ParameterBag.php';
include __DIR__ . '/vendor/symfony/http-foundation/Symfony/Component/HttpFoundation/FileBag.php';
include __DIR__ . '/vendor/symfony/http-foundation/Symfony/Component/HttpFoundation/ServerBag.php';
include __DIR__ . '/vendor/symfony/http-foundation/Symfony/Component/HttpFoundation/HeaderBag.php';
include __DIR__ . '/vendor/symfony/http-foundation/Symfony/Component/HttpFoundation/Request.php';
include __DIR__ . '/vendor/symfony/http-foundation/Symfony/Component/HttpFoundation/ApacheRequest.php';
include __DIR__ . '/vendor/symfony/http-foundation/Symfony/Component/HttpFoundation/ResponseHeaderBag.php';
include __DIR__ . '/vendor/symfony/http-foundation/Symfony/Component/HttpFoundation/Response.php';

/**
 *
 */
include __DIR__ . '/vendor/mvc5/mvc5/src/Arg.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/Signal.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/Resolvable.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/Config/ArrayAccess.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/Config/Config.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/Config/Configuration.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/Service/Config.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/Service/Container.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/Service/Service.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/Service/Manager.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/Service/Plugin.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/Event/Event.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/Event/Generator.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/Event/Model.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/Event/Signal.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/Config.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/Container.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/Event.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/Plugin.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/Service.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/View/Template/View.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/View/Template/Templates.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/View/Template/Renderer.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/View/Model.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/View/Render.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/View/Renderer.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/Mvc/Event/Model.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/Mvc/Mvc.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/Response/Response.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/Response/Controller.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/Response/Dispatch.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/Response/Send.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/Response/Status.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/Route/Config/Definition.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/Route/Config/Route.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/Route/Definition/Dash.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/Route/Definition/Params.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/Route/Definition/Regex.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/Route/Definition/Tokens.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/Route/Definition/Build.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/Route/Definition/Add.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/Route/Definition/Compile.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/Route/Route.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/Route/Config.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/Route/Definition.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/Route/Generator.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/Route/Match/Hostname.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/Route/Match/Method.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/Route/Match/Path.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/Route/Match/Scheme.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/Route/Match/Wildcard.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/Route/Router/Router.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/Route/Definition/Config.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/Route/Dispatch.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/Route/Dispatcher.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/Route/Filter.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/Route/Match.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/Route/Router.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/Route/Error/Create.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/Route/Exception/Create.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/Route/Exception/Controller.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/Controller/Exception.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/Controller/Action.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/Url/Plugin.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/Url/Generator.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/Mvc/Controller.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/Mvc/Layout.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/Mvc/Response.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/Mvc/Route.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/Mvc/View.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/Resolver/Dispatch.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/Resolver/Exception.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/Resolver/Generator.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/Resolver/Initializer.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/Resolver/Resolver.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/Model/Template.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/Model/Layout.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/Model/ViewModel.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/Model/ViewLayout.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/Model/Template/Model.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/Model/Template/Plugin.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/Model/Template/Layout.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/Model/Plugin.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/Model/Layout/Plugin.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/Plugin/Config/Args.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/Plugin/Config/Plugin.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/Plugin/Config/Child.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/Plugin/Config/Config.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/Plugin/Config/Hydrator.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/Plugin/Config/Name.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/Plugin/Gem/Plugin.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/Plugin/Gem/Args.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/Plugin/Gem/Call.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/Plugin/Gem/Calls.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/Plugin/Gem/Child.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/Plugin/Gem/Config.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/Plugin/Gem/Dependency.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/Plugin/Gem/Factory.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/Plugin/Gem/Filter.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/Plugin/Gem/Invokable.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/Plugin/Gem/Invoke.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/Plugin/Gem/Link.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/Plugin/Gem/Param.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/Plugin/Gem/Plug.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/Plugin/Args.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/Plugin/Call.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/Plugin/Calls.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/Plugin/Child.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/Plugin/Config.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/Plugin/Controller.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/Plugin/Dependency.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/Plugin/Factory.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/Plugin/Filter.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/Plugin/Form.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/Plugin/Hydrator.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/Plugin/Invokable.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/Plugin/Invoke.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/Plugin/Link.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/Plugin/Manager.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/Plugin/Plugin.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/Plugin/Model.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/Plugin/Param.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/Plugin/Plug.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/Plugin/Response.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/Plugin/Service.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/App.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/Web.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/Layout.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/Model.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/Template.php';
include __DIR__ . '/vendor/mvc5/mvc5/src/Mvc.php';

/**
 *
 */
include __DIR__ . '/src/Request/Request.php';
include __DIR__ . '/src/Request/HttpRequest.php';
include __DIR__ . '/src/Response/Response.php';
include __DIR__ . '/src/Response/HttpResponse.php';

/**
 *
 */
/*include __DIR__ . '/src/Blog/Model.php';
include __DIR__ . '/src/Blog/Controller.php';
include __DIR__ . '/src/Blog/Create/Create.php';
include __DIR__ . '/src/Blog/Add/Validate.php';
include __DIR__ . '/src/Blog/Add/Save.php';
include __DIR__ . '/src/Blog/Add/Respond.php';
include __DIR__ . '/src/Home/Factory.php';
include __DIR__ . '/src/Home/Controller.php';
include __DIR__ . '/src/Home/Model.php';
include __DIR__ . '/src/Console/Example.php';
include __DIR__ . '/src/Plugin/Gem/Controller.php';
include __DIR__ . '/src/Plugin/Gem/Route.php';
include __DIR__ . '/src/Plugin/Controller.php';
include __DIR__ . '/src/Plugin/Route.php';
include __DIR__ . '/src/Service/ServiceProvider.php';
include __DIR__ . '/src/Service/ServiceManager.php';*/

/**
 *
 */
include __DIR__ . '/vendor/autoload.php';
