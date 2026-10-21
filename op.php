namespace App\Http\Controllers;

use App\Models\Schedule;
use App\Models\Movie;
use App\Models\TicketPrice;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function index() {
        $schedules = Schedule::with(['movie', 'ticketPrice'])->latest()->paginate(10);
        return view('admin.schedules.index', compact('schedules'));
    }

    public function create() {
        $movies = Movie::all();
        $ticketPrices = TicketPrice::all();
        return view('admin.schedules.create', compact('movies', 'ticketPrices'));
    }

    public function store(Request $request) {
        $request->validate([
            'movie_id' => 'required|exists:movies,id',
            'ticket_price_id' => 'required|exists:ticket_prices,id',
            'show_time' => 'required|date',
            'studio' => 'required|string|max:50',
        ]);

        Schedule::create($request->all());

        return redirect()->route('schedules.index')->with('success', 'Jadwal tayang berhasil ditambahkan!');
    }

    public function edit(Schedule $schedule) {
        $movies = Movie::all();
        $ticketPrices = TicketPrice::all();
        return view('admin.schedules.edit', compact('schedule', 'movies', 'ticketPrices'));
    }

    public function update(Request $request, Schedule $schedule) {
        $request->validate([
            'movie_id' => 'required|exists:movies,id',
            'ticket_price_id' => 'required|exists:ticket_prices,id',
            'show_time' => 'required|date',
            'studio' => 'required|string|max:50',
        ]);

        $schedule->update($request->all());

        return redirect()->route('schedules.index')->with('success', 'Jadwal tayang berhasil diperbarui!');
    }

    public function destroy(Schedule $schedule) {
        $schedule->delete();
        return redirect()->route('schedules.index')->with('success', 'Jadwal tayang berhasil dihapus!');
    }
}
