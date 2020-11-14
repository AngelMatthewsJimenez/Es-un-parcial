<?php
class PersonServiceCookies implements IServiceBase
{

    private $utilities;
    private $cookieName;

    public function __construct()
    {

        $this->utilities = new Utilities();
        $this->cookiesName = "persona";
    }

    public function GetList()
    {
        $ListadoPersona = array();

        if (isset($_COOKIE[$this->cookiesName])) {

            $ListadoPersona = json_decode($_COOKIE[$this->cookiesName], false);

        } else {
            setcookie($this->cookiesName, json_encode($ListadoPersona), $this->utilities->cookiesTime(), "/");

        }
        return $ListadoPersona;
    }

    public function GetId($id)
    {
        $ListadoPersona = $this->GetList();
        $elementDecode = $this->utilities->buscarPropiedad($ListadoPersona, 'id', $id)[0];
        $person = new persona();
        $person->set($elementDecode);
        return $person;

    }
    public function Add($entity)
    {
        $ListadoPersona = $this->GetList();
        $personId = 1;

        if (!empty($ListadoPersona)) {
            $lastPerson = $this->utilities->getLastElement($ListadoPersona);
            $personId = $lastPerson->id + 1;
        }
        $entity->id = $personId;
        array_push($ListadoPersona, $entity);
        setcookie($this->cookiesName, json_encode($ListadoPersona), $this->utilities->cookiesTime(), "/");
    }

    public function Update($id, $entity)
    {

        $element = $this->GetId($id);
        $ListadoPersona = $this->GetList();

        $elementIndex = $this->utilities->getIndexElement($ListadoPersona, 'id', $id);
        $ListadoPersona[$elementIndex] = $entity;

        setcookie($this->cookiesName, json_encode($ListadoPersona), $this->utilities->cookiesTime(), "/");

    }

    public function Delete($id)
    {

        $ListadoPersona = $this->GetList();
        $elementIndex = $this->utilities->getIndexElement($ListadoPersona, 'id', $id);

        unset($ListadoPersona[$elementIndex]);
        $ListadoPersona = array_values($ListadoPersona);

        setcookie($this->cookiesName, json_encode($ListadoPersona), $this->utilities->cookiesTime(), "/");
    }

}