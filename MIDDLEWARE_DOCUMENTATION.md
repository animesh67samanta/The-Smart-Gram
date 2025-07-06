# Middleware Documentation

## Overview
This Laravel application uses role-based authentication middleware to control access to different areas of the application. The system uses a single `Admin` model with a `user_type` field to distinguish between different user roles.

## Guards and Dashboards

- **Admin, Panchayat, and Officer** each have their own authentication guards and dashboard routes.
- Controller redirects (e.g., after login) use named routes like `admin.dashboard`, `panchayat.dashboard`, and `officer.dashboard`.

## Best Practice

- When updating controller redirects or authentication logic, always ensure the corresponding named routes exist in your `routes/` files.
- Keep route names in sync with what your controllers expect for smooth navigation and to avoid runtime errors.

## User Types
- `admin` - Super admin users with full access
- `panchayat` - Panchayat users with limited administrative access
- `officer` - Officer users with certificate approval and viewing access

## Middleware Files

### 1. AdminAuth Middleware (`app/Http/Middleware/AdminAuth.php`)
- **Purpose**: Protects admin-only routes
- **Guard**: `admin`
- **User Type Check**: Ensures `user_type === 'admin'`
- **Redirect**: `admin.login` if unauthorized
- **Usage**: Applied to all admin routes

### 2. PanchayatAuth Middleware (`app/Http/Middleware/PanchayatAuth.php`)
- **Purpose**: Protects panchayat-only routes
- **Guard**: `panchayat`
- **User Type Check**: Ensures `user_type === 'panchayat'`
- **Redirect**: `panchayat.login` if unauthorized
- **Usage**: Applied to all panchayat routes

### 3. OfficerAuth Middleware (`app/Http/Middleware/OfficerAuth.php`)
- **Purpose**: Protects officer-only routes
- **Guard**: `officer`
- **User Type Check**: Ensures `user_type === 'officer'`
- **Redirect**: `officer.login` if unauthorized
- **Usage**: Applied to all officer routes

## Route Configuration

### Admin Routes (`routes/admin.php`)
```php
Route::middleware('admin')->group(function () {
    // Admin-only routes
});
```

### Panchayat Routes (`routes/panchayat.php`)
```php
Route::middleware('panchayat')->group(function () {
    // Panchayat-only routes
});
```

### Officer Routes (`routes/officer.php`)
```php
Route::middleware('officer')->group(function () {
    // Officer-only routes
});
```

## Authentication Flow

1. **Login Process**: Each authentication controller checks the `user_type` field after successful authentication
2. **Route Protection**: Middleware validates the user type before allowing access to protected routes
3. **Session Management**: users use the `admin`,`panchayat`,`officer` guard but with different user types
4. **Logout**: Users are redirected to their respective login pages

## Security Features

- **Role-based Access Control**: Each middleware ensures only the correct user type can access specific routes
- **Session Security**: Proper session regeneration and CSRF protection
- **Error Handling**: Clear error messages for unauthorized access attempts
- **Redirect Logic**: Users are redirected to appropriate login pages based on their role

## Usage Examples

### Adding New Protected Routes
```php
// For admin routes
Route::middleware('admin')->group(function () {
    Route::get('/admin-only', [AdminController::class, 'index']);
});

// For panchayat routes
Route::middleware('panchayat')->group(function () {
    Route::get('/panchayat-only', [PanchayatController::class, 'index']);
});

// For officer routes
Route::middleware('officer')->group(function () {
    Route::get('/officer-only', [OfficerController::class, 'index']);
});
```

### Checking User Type in Controllers
```php
// Check if user is admin
if (Auth::guard('admin')->user()->user_type === 'admin') {
    // Admin-specific logic
}

// Check if user is panchayat
if (Auth::guard('panchayat')->user()->user_type === 'panchayat') {
    // Panchayat-specific logic
}

// Check if user is officer
if (Auth::guard('officer')->user()->user_type === 'officer') {
    // Officer-specific logic
}
```

## Benefits

1. **Improved Security**: Role-specific middleware prevents unauthorized access
2. **Better Organization**: Clear separation of concerns between different user types
3. **Maintainability**: Easy to modify access control for specific roles
4. **User Experience**: Proper error messages and redirects for unauthorized access
5. **Scalability**: Easy to add new user types or modify existing ones 