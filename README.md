# TO DO
- Create extra models(vote, tag)






Para establecer una relación **One-to-Many** en Laravel entre dos modelos y manejarla correctamente en las migraciones, debes seguir dos pasos principales:

1. **Definir la relación en los modelos**.
2. **Agregar la clave foránea (foreign key) en las migraciones**.

Te explico cómo hacerlo paso a paso.

### 1. Definir la relación en los modelos

Supongamos que tienes dos modelos: **`User`** y **`Post`**, donde un **usuario** puede tener muchos **posts** (relación Uno a Muchos).

- **Modelo `User`** (uno):
  ```php
  class User extends Model
  {
      // Relación One-to-Many: Un usuario tiene muchos posts
      public function posts()
      {
          return $this->hasMany(Post::class);
      }
  }
  ```

- **Modelo `Post`** (muchos):
  ```php
  class Post extends Model
  {
      // Relación Many-to-One: Un post pertenece a un usuario
      public function user()
      {
          return $this->belongsTo(User::class);
      }
  }
  ```

La clave aquí es que el **modelo `Post`** contiene una clave foránea (`user_id`) que hace referencia al `id` del modelo `User`. Esto establece la relación en la base de datos.

### 2. Agregar las claves foráneas en las migraciones

En el lado de las migraciones, necesitas agregar el campo **clave foránea** (por ejemplo, `user_id`) en la tabla que representa la parte "muchos" de la relación (en este caso, `posts`).

#### Migración para la tabla `users` (el lado "uno")

Esta migración es la más básica:

```php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->string('name');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('users');
    }
}
```

#### Migración para la tabla `posts` (el lado "muchos")

Aquí es donde necesitas agregar la **clave foránea** (`user_id`) que apunta a la tabla `users`:

```php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePostsTable extends Migration
{
    public function up()
    {
        Schema::create('posts', function (Blueprint $table) {
            $table->id(); // Primary Key
            $table->string('title');
            $table->text('content');
            
            // Agregar la columna de la clave foránea (user_id)
            $table->unsignedBigInteger('user_id');

            // Definir la clave foránea que apunta a la tabla users
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
```

#### Explicación:
- **`$table->unsignedBigInteger('user_id')`**: Se crea la columna `user_id` que almacenará la clave foránea.
- **`$table->foreign('user_id')`**: Se establece una relación de clave foránea que apunta al campo `id` de la tabla `users`.
- **`onDelete('cascade')`**: Define que si el usuario es eliminado, los posts asociados también se eliminarán automáticamente.

### Resumen del proceso

1. **Modelos**: Define la relación en tus modelos utilizando `hasMany()` y `belongsTo()`.
2. **Migraciones**:
   - Crea la tabla "padre" (`users` en este ejemplo).
   - En la tabla "hija" (`posts`), añade una columna para la clave foránea (`user_id`) y define la relación con `foreign()`.

Este patrón garantiza que la relación esté correctamente definida tanto en la base de datos como en los modelos de Laravel.

<!-- https://leerolymp.com/capitulo/26972/comic-nuevaface-1n -->