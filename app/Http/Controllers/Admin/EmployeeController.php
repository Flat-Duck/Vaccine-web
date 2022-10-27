<?php

namespace App\Http\Controllers\Admin;

use App\Employee;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
    
class EmployeeController extends Controller
    {
        /**
         * Display a list of Services.
         *
         * @return \Illuminate\Http\Response
         */
        public function index()
        {
            $employees = Employee::getList();
    
            return view('admin.employees.index', compact('employees'));
        }
    
        /**
         * Show the form for creating a new Employee
         *
         * @return \Illuminate\Http\Response
         */
        public function create()
        {
          //  $status = Employee::status();
    
            return view('admin.employees.add');
        }
    
        /**
         * Save new Employee
         *
         * @return \Illuminate\Http\RedirectResponse
         */
        public function store()
        {
       
            $validatedData = request()->validate(Employee::createValidationRules());
            
            $validatedData['password'] = bcrypt($validatedData['password']);
            
            $employee = Employee::create($validatedData);
        
                return redirect()->route('admin.employees.index')->with([
                    'type' => 'success',
                    'message' => 'Employee added'
                ]);
            // } else {
            //     echo 'error';
            // }
         
        }
    
        /**
         * Show the form for editing the specified Employee
         *
         * @param \App\Employee $employee
         * @return \Illuminate\Http\Response
         */
        public function edit(Employee $employee)
        {
         //   $status = Employee::status();
            return view('admin.employees.edit', compact('employee'));
        }
    
        /**
         * Update the Employee
         *
         * @param \App\Employee $employee
         * @return \Illuminate\Http\RedirectResponse
         */
        public function update(Employee $employee)
        {
            $validatedData = request()->validate(
                Employee::updateValidationRules($employee->id)
            );
    
            $employee->update($validatedData);
    
            return redirect()->route('admin.employees.index')->with([
                'type' => 'success',
                'message' => 'Employee Updated'
            ]);
        }
    
        /**
         * Delete the Employee
         *
         * @param \App\Employee $employee
         * @return void
         */
        public function destroy(Employee $employee)
        {
            // if ($employee->providers()->count()) {
            //     return redirect()->route('admin.employees.index')->with([
            //         'type' => 'error',
            //         'message' => 'This record cannot be deleted as there are relationship dependencies.'
            //     ]);
            // }
            // $factory = (new Factory)->withServiceAccount(__DIR__.'/broken.json');
            // $database = $factory->createDatabase();
            // $database->getReference('employees/'.$employee->fbID)->remove();
    
    
            $employee->delete();
    
            return redirect()->route('admin.employees.index')->with([
                'type' => 'success',
                'message' => 'Employee deleted successfully'
            ]);
        }
    }
    