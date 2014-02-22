<?php

	include_once("api/include/config.php");
	include_once("api/include/auth.lib.php");
	include_once("api/include/functions.php");
  
  ?>

<!DOCTYPE html PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<html ng-app="app">
  <head>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.12/angular.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.12/angular-resource.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.2.12/angular-route.min.js"></script>
    <script src="https://code.jquery.com/jquery.js"></script>
    <script src="http://angular-ui.github.io/bootstrap/ui-bootstrap-tpls-0.5.0.js"></script>
    
    <script src="js/app.js"></script>
    
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">  
    <link href="css/index.css" rel="stylesheet">
  </head>
  <body>
    
    <div ng-controller="ConfigurationCtrl" ng-cloak class="container theme-showcase"> 
      
      <div style="text-align: center; margin-bottom: 40px">
        <h1>Judo Demo - pannello di configurazione</h1>
      </div>
      
      <p>
        <div class="row">
          <div class="col-sm-5">
            <a href="export-atleti-xls.php" class="btn btn-primary btn-lg btn-custom" target="blank" role="button">Elenco atleti (xls)</a>
          </div>
          <div ng-controller="DialogCtrl">
              <div class="col-sm-5">
                <button class="btn btn-primary btn-lg btn-custom" ng-click="openDialog(<?php echo getTotPalestre() ?>)">Invio email</button>
              </div>
          </div>
          <div class="col-sm-1">
            <a href="logout.php" class="btn btn-primary btn-lg btn-custom text-right" role="button">Logout</a>
          </div>
        </div>
      </p>
      
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title">Configurazioni</h3>
        </div>
        <div class="panel-body">
            <div class="row" ng-repeat="conf in configuration | orderBy:'Id':true"> 
                <div class="col-sm-3">{{conf.desc}}</div> 
                <div class="col-sm-8"> 
                  <div class="btn-group"> 
                    <i class="btn btn-xs btn-info" ng-click="updateConfiguration(conf)">Salva</i> 
                  </div> 
                  <input ng-model="conf.value" ng-show="true" class="input-large"/>&nbsp; 
                </div>
          </div>
        </div>
      </div>
    </div>
    
    <div ng-controller="Lookups" ng-cloak class="container theme-showcase"> 
      
      <div class="row">
        <div class="col-sm-4">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title">Gradi
                <span ng-click="toggleAddModeGrade()" ng-class="{'glyphicon-minus': addMode, 'glyphicon-plus': !addMode}" class="btn-lookup btn btn-default glyphicon"></span>
              </h3>
              
            </div>
            <div class="panel-body lookup-table">
              <table class="table">
                <tbody>
                  
                  <tr ng-show="addModeGrade">
                      <td class="td-lookup">
                          <input ng-model="object.description" class="form-control" />
                      </td>
                      <td>
                          <div class="btn-toolbar">
                              <div class="btn-group">
                                  <i class="btn btn-default glyphicon glyphicon-save" ng-click="addObject('grade')"></i>
                              </div>
                          </div>
                      </td>
                  </tr>
                  
                  <tr ng-repeat="grade in grades" class="active">
                    <td class="td-lookup">{{grade.description}}</td>
                    <td class="btn btn-default glyphicon glyphicon-trash" ng-click="deleteObject(grade, 'grade')"></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title">Nazioni
                <span ng-click="toggleAddModeNation()" ng-class="{'glyphicon-minus': addMode, 'glyphicon-plus': !addMode}" class="btn-lookup btn btn-default glyphicon"></span>
              </h3>
            </div>
            <div class="panel-body lookup-table">
              <table class="table">
                <tbody>
                  
                  <tr ng-show="addModeNation">
                      <td class="td-lookup">
                          <input ng-model="object.description" class="form-control" />
                      </td>
                      <td>
                          <div class="btn-toolbar">
                              <div class="btn-group">
                                  <i class="btn btn-default glyphicon glyphicon-save" ng-click="addObject('nation')"></i>
                              </div>
                          </div>
                      </td>
                  </tr>
                  
                  <tr ng-repeat="nation in nations" class="active">
                    <td class="td-lookup">{{nation.description}}</td>
                    <td class="btn btn-default glyphicon glyphicon-trash" ng-click="deleteObject(nation, 'nation')"></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
        <div class="col-sm-4">
          <div class="panel panel-primary">
            <div class="panel-heading">
              <h3 class="panel-title">Province
                <span ng-click="toggleAddModeProvincia()" ng-class="{'glyphicon-minus': addMode, 'glyphicon-plus': !addMode}" class="btn-lookup btn btn-default glyphicon"></span>
              </h3>
            </div>
            <div class="panel-body lookup-table">
              <table class="table">
                <tbody>

                  <tr ng-show="addModeProvincia">
                      <td class="td-lookup">
                          <input ng-model="object.description" class="form-control" />
                      </td>
                      <td>
                          <div class="btn-toolbar">
                              <div class="btn-group">
                                  <i class="btn btn-default glyphicon glyphicon-save" ng-click="addObject('provincia')"></i>
                              </div>
                          </div>
                      </td>
                  </tr>
                  
                  <tr ng-repeat="provincia in provincie" class="active">
                    <td class="td-lookup">{{provincia.description}}</td>
                    <td class="btn btn-default glyphicon glyphicon-trash" ng-click="deleteObject(provincia, 'provincia')"></td>
                  </tr>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>    
    
    <div ng-controller="AthletesCtrl" ng-cloak class="container theme-showcase">
      
      <div class="panel panel-primary">
        <div class="panel-heading">
          <h3 class="panel-title">Atleti iscritti:<span> {{filtered.length}}</span></h3>
        </div>
        <div class="panel-body">
         
          <p>
            Cerca: <input ng-model="query">&nbsp;
            
            <span style="margin-left: 20px; margin-right: 20px">
              Filtra per, societ&agrave;:
              <select ng-model="gym.gym">
                <option selected value=''></option>
                <option ng-repeat="gym in gyms" value="{{gym.id}}">
                  {{gym.description}}
                </option>
              </select>
              
              grado:
              <select ng-model="grade.grade">
                <option selected value=''></option>
                <option ng-repeat="grade in grades" value="{{grade.id}}">
                  {{grade.description}}
                </option>
              </select>
              
              sesso:
              <select ng-model="gender.gender">
                <option selected value=''></option>
                <option value="M">M</option>
                <option value="F">F</option>
              </select>
              
            </span>
            
            Ordina per:
            <select ng-model="orderProp">
              <option selected value=''></option>
              <option value="gym_desc">Societ&agrave;</option>
              <option value="lastname">Cognome</option>
              <option value="gender">Sesso</option>
              <option value="weight">Peso</option>
              <option value="year">Anno</option>
            </select>
          </p>  
        
          <table class="table">
            <thead>
              <tr>
                <th>Societ&agrave;</th>
                <th>Cognome</th>
                <th>Nome</th>
                <th>Grado</th>
                <th>Anno</th>
                <th>Sesso</th>
                <th>Peso</th>                
                <th>SQ</th>
                <th>Ranking</th>
              </tr>
            </thead>
            <tbody>
              <tr ng-repeat="athlete in filtered = (athletes | filter:query | filter:grade | filter:gym | filter:gender | orderBy:orderProp)" class="active">
                <td>{{athlete.gym_desc}}</td>
                <td>{{athlete.lastname}}</td>
                <td>{{athlete.name}}</td>
                <td>{{athlete.grade}}</td>
                <td>{{athlete.year}}</td>
                <td>{{athlete.gender}}</td>
                <td class='text-right'>{{athlete.weight}}</td>
                <td>{{athlete.sq}}</td>
                <td>{{athlete.ranking}}</td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    
  </body>
</html>