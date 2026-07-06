<?php

namespace App\Http\Controllers\Master;

use App\Http\Controllers\Controller;
use App\Services\EmployeeService;
use App\DTO\User\UserDTO;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function __construct(protected EmployeeService $service) {}

    // 1. Create Employee
    public function store(Request $request)
    {
        $validated = $request->validate([
            'emp_card_no' => 'required|unique:employees,emp_card_no',
            'name'        => 'required|string|max:100',
            'position'    => 'required|in:operator,qc_auditor,supervisor,admin',
            'username'    => 'required|unique:employees,username',
            'password'    => 'required|min:6'
        ]);

        $dto = new UserDTO(
            employee_id: null,
            emp_card_no: $validated['emp_card_no'],
            name: $validated['name'],
            position: $validated['position'],
            username: $validated['username'],
            password: $validated['password'],
            nic: $request->input('nic'),
            contact_number: $request->input('contact_number')
        );

        $user = $this->service->register($dto);
        return response()->json(['message' => 'Employee registered', 'data' => $user], 201);
    }

    // 2. View All Employees
    public function index()
    {
        return response()->json($this->service->getAllEmployees());
    }

    // 3. Update Credentials
    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'username' => 'required',
            'password' => 'required|min:6'
        ]);

        // Note: For update, we pass minimal data. Ensure your DTO constructor
        // handles these as partials or uses the defaults for the others.
        $dto = new UserDTO(
            employee_id: (int)$id,
            emp_card_no: 'N/A',
            name: 'N/A',
            position: 'N/A',
            username: $validated['username'],
            password: $validated['password']
        );

        return response()->json(['message' => 'Updated successfully', 'data' => $this->service->updateCredentials((int)$id, $dto)]);
    }

    // 4. Delete Employee
    public function destroy($id)
    {
        $this->service->deleteEmployee((int)$id);
        return response()->json(['message' => 'Employee deleted successfully']);
    }
}
