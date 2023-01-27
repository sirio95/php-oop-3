<?php
class Salary
{
    private $monthly;
    private $thirteenth;
    private $fourteenth;

    public function __construct($monthly, $thirteenth, $fourteenth)
    {
        $this->set_monthly($monthly);
        $this->set_thirteenth($thirteenth);
        $this->set_fourteenth($fourteenth);
    }
    public function set_monthly($monthly)
    {
        $this->monthly = $monthly;
    }
    public function get_monthly()
    {
        return $this->monthly;
    }
    public function set_thirteenth($thirteenth)
    {
        $this->thirteenth = $thirteenth;
    }
    public function get_thirteenth()
    {
        return $this->thirteenth;
    }
    public function set_fourteenth($fourteenth)
    {
        $this->fourteenth = $fourteenth;
    }
    public function get_fourteenth()
    {
        return $this->fourteenth;
    }


    public function calc_annual_salary()
    {
        $salary = ($this->monthly * 12);
        if ($this->thirteenth) {
            $salary += $this->monthly;
        }
        if ($this->fourteenth) {
            $salary += $this->monthly;
        }
        return $salary;
    }

    public function get_html_stipendio()
    {
        return "<div> Reddito lordo : " . $this->calc_annual_salary() . "euro</div><div> Stipendio mensile: "
            . $this->monthly . "euro</div><div> Tredicesima: " . $this->thirteenth . "</div><div> Quattordicesima: "
            . $this->fourteenth . "</div>";
    }
}

class Persona
{
    private $name;
    private $surname;
    private $birth_date;
    private $birth_place;
    private $tax_id;

    public function __construct($name, $surname, $birth_date, $birth_place, $tax_id)
    {
        $this->set_name($name);
        $this->set_surname($surname);
        $this->set_birth_date($birth_date);
        $this->set_birth_place($birth_place);
        $this->set_tax_id($tax_id);
    }
    public function set_name($name)
    {
        $this->name = $name;
    }
    public function set_surname($surname)
    {
        $this->surname = $surname;
    }
    public function set_birth_date($birth_date)
    {
        $this->birth_date = $birth_date;
    }
    public function set_birth_place($birth_place)
    {
        $this->birth_place = $birth_place;
    }
    public function set_tax_id($tax_id)
    {
        $this->tax_id = $tax_id;
    }
    public function get_name()
    {
        return $this->name;
    }
    public function get_surname()
    {
        return $this->surname;
    }
    public function get_birth_date()
    {
        return $this->birth_date;
    }
    public function get_birth_place()
    {
        return $this->birth_place;
    }
    public function get_tax_id()
    {
        return $this->tax_id;
    }

    public function get_persona_html()
    {
        return "<h3>" . $this->name . " " . $this->surname . "</h3><div> Nato il: "
            . $this->birth_date . "</div><div> A: "
            . $this->birth_place . "</div><div> Codice fiscale: "
            . $this->tax_id . "</div>";
    }
}

class Impiegato extends Persona
{
    private $start_employment;
    private $salary;

    public function __construct($name, $surname, $birth_date, $birth_place, $tax_id, $start_employment, Salary $salary)
    {
        parent::__construct($name, $surname, $birth_date, $birth_place, $tax_id);
        $this->set_start_employment($start_employment);
        $this->set_salary($salary);
    }
    public function set_start_employment($start_employment)
    {
        $this->start_employment = $start_employment;
    }
    public function get_start_employment()
    {
        return $this->start_employment;
    }
    public function set_salary(Salary $salary)
    {
        $this->salary = $salary;
    }
    public function get_salary()
    {
        return $this->salary;
    }


    public function get_annual_salary()
    {
        return $this->salary->calc_annual_salary();
    }
    public function get_impiegato_html()
    {
        return parent::get_persona_html()
            . "<div>Ruolo: dipendente</div><div> Assunto il: "
            . $this->start_employment . "</div><div>"
            . $this->salary->get_html_stipendio() . "</div>";
    }


}
class Capo extends Persona
{
    private $dividendo;
    private $bonus;

    public function __construct($name, $surname, $birth_date, $birth_place, $tax_id, $dividendo, $bonus)
    {
        parent::__construct($name, $surname, $birth_date, $birth_place, $tax_id);
        $this->set_dividendo($dividendo);
        $this->set_bonus($bonus);
    }
    public function set_dividendo($dividendo)
    {
        $this->dividendo = $dividendo;
    }
    public function get_dividendo()
    {
        return $this->dividendo;
    }
    public function set_bonus($bonus)
    {
        $this->bonus = $bonus;
    }
    public function get_bonus()
    {
        return $this->bonus;
    }

    public function get_annual_income()
    {
        return (($this->dividendo * 12) + $this->bonus);
    }

    public function get_capo_html()
    {
        return parent::get_persona_html()
            . "<div> Ruolo: Capo</div><div> Dividendo: "
            . $this->dividendo . "</div><div> Bonus: "
            . $this->bonus . "</div><div> Reddito annuale: "
            . $this->get_annual_income() . "euro</div>";
    }
}